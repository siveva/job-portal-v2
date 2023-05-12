<section class="ftco-section ftco-counter">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
            <div class="col-md-7 heading-section text-center ftco-animate">
                <span class="subheading">Categories work wating for you</span>
                <h2 class="mb-4"><span>Current</span> Job Posts</h2>
            </div>
        </div>
        <div class="row">
            @php $count = 0; @endphp
            @foreach($categories as $category)
                @if ($count % 4 == 0)
                    @if ($count != 0)
                        </ul>
                        </div>
                    @endif
                    <div class="col-md-3 ftco-animate">
                    <ul class="category">
                @endif
                    <li><a href="#">{{ $category->name }} <span class="number" data-number="{{ $category->job_listings_count }}">0</span></a></li>
                @php $count++; @endphp
            @endforeach
            @if ($count % 4 != 0)
                </ul>
                </div>
            @endif            
    </div>
    </div>
</section>