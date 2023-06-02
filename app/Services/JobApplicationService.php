<?php

namespace App\Services;

use App\Interfaces\JobApplicationServiceInterface;
use App\Models\Application;
use App\Models\Notification;
use Illuminate\Support\Facades\Mail;
use App\Mail\ApplicationNotificationMail;
use Illuminate\Support\Facades\Auth;
use App\Services\SmsService;

class JobApplicationService implements JobApplicationServiceInterface
{
    private $smsService;

    public function __construct(SmsService $smsService)
    {
        $this->smsService = $smsService;
    }
    public function updateApplicationStatus($id, array $data)
    {
        $application = Application::find($id);
        $statusMessage = '';
        $type = $data['type'];

        if ($type === 'accept') {
            $application->status = 'accepted';

            $statusMessage = 'Application was successfully accepted';
            $emailNotificationMessage = $this->generateAcceptanceMessage($application);
            $emailSubject = 'Accepted Application';
            $smsNotificationMessage = 'Your application for ' . $application->jobListing->title . 'was accepted';
        } elseif($type === "schedule_for_interview") {
            $application->status = 'scheduled_for_interview';

            $statusMessage = 'Application was scheduled successfully';
            $emailNotificationMessage = $data['message'];
            $emailSubject = 'Scheduled for Interview Application';
            $smsNotificationMessage = $data['message'];
        } elseif ($type === 'reject') {
            $application->status = 'rejected';

            $statusMessage = 'Application was rejected';
            $emailNotificationMessage = $this->generateRejectionMessage($application);
            $emailSubject = 'Rejected Application';
            $smsNotificationMessage = 'Your application for ' . $application->jobListing->title . 'was rejected';
        }

        $this->smsService->sendSms($application->jobSeeker->phone_number, $smsNotificationMessage);
        $this->sendNotification($application, $emailSubject, $emailNotificationMessage);

        $application->save();

        return ['application' => $application, 'statusMessage' => $statusMessage];
    }

    private function generateAcceptanceMessage($application)
    {
        $applicantName = $application->jobSeeker->name;
        $organizationName = $application->jobListing->employer->employer->company_name;

        $message = "<p>Dear $applicantName</p>,
        <p>Congratulations! We are pleased to inform you that your application to join our team at $organizationName has been accepted.</p>
        <p>We were impressed with your qualifications and experience, and we believe you will be a valuable addition to our organization.</p>
        <p>Please let us know your availability for further discussions and next steps.</p>
        <p>Welcome aboard, and we look forward to working with you!<p>";

        return $message;
    }

    private function generateRejectionMessage($application)
    {
        $applicantName = $application->jobSeeker->name;
        $organizationName = $application->jobListing->employer->employer->company_name;
    
        $message = "
            <p>Dear $applicantName,</p>
            <p>Thank you for your interest in joining our team at $organizationName. We appreciate the time and effort you put into your application.</p>
            <p>After careful consideration, we regret to inform you that your application was not successful. Although your qualifications and experience were impressive, we have chosen another candidate who closely aligns with our current requirements.</p>
            <p>We encourage you to continue pursuing opportunities that match your skills and aspirations. We value your talents and wish you the best in your future endeavors.</p>
        ";
    
        return $message;
    }
    

    private function sendNotification($application, $subject, $message)
    {
        $email = $application->jobSeeker->email;

        // Send email
        Mail::to($email)->send(new ApplicationNotificationMail($subject, $message));

        $notificationMessage = ['subject' => $subject, 'body' => $message];
        // Save notification to the database
        Notification::create([
            'sender_id'   =>  Auth::id(),
            'receiver_id'   =>  $application->jobSeeker->id,
            'application_id'   =>  $application->id,
            'message' => json_encode($notificationMessage),
        ]);
    }
}
