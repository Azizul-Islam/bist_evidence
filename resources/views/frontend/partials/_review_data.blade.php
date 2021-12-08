@foreach ($property->reviews as $review)
    <div class="review-item">
        <img src="{{ asset('frontend/assets/agents/'.$review->user->photo) }}" alt="avatar-1" class="author-img">
        <div class="review-content">
            <p class="d-flex mb-0">
                <span class="author-name">{{ $review->user->name ?? '' }}</span>
                {{-- <i class="material-icons text-muted px-1" title="Dissatisfied">sentiment_dissatisfied</i> --}}
                @if (!blank($review->rating))
                    <span class="rating" style="display: block">
                        @if ($review->rating == 1)
                            <label>★</label>
                        @elseif($review->rating == 2)
                            <label>★</label>
                            <label>★</label>
                        @elseif($review->rating == 3)
                            <label>★</label>
                            <label>★</label>
                            <label>★</label>
                        @elseif($review->rating == 4)
                            <label>★</label>
                            <label>★</label>
                            <label>★</label>
                            <label>★</label>
                        @else
                            <label>★</label>
                            <label>★</label>
                            <label>★</label>
                            <label>★</label>
                            <label>★</label>
                        @endif
                    </span>
                @endif
            </p>
            <p class="text-muted fw-500 mb-2"><small>{{ date('d M, Y  h:m', strtotime($review->created_at)) }}</small>
            </p>
            <p class="text">{{ $review->comment }}</p>
        </div>
    </div>
@endforeach
