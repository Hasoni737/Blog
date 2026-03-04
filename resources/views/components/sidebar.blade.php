<div class="col-lg-3">
    <div class="sticky-top" style="top: 20px; z-index: 1;">
        <!-- Search widget-->
        {{-- <div class="card mb-4">
            <div class="card-header">Search</div>
            <div class="card-body">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Enter search term..."
                        aria-label="Enter search term..." aria-describedby="button-search" />
                    <button class="btn btn-primary" id="button-search" type="button">Go!</button>
                </div>
            </div>
        </div> --}}
        <!-- Categories widget-->
        <div class="card mb-4">
            <div class="card-header">Categories</div>
            <div class="card-body">
                <ul class="list-group list-group-flush">
                    @foreach ($categories as $category)
                        <li
                            class="list-group-item d-flex justify-content-between align-items-center py-2 px-0 bg-transparent border-bottom">
                            <a href="{{ route('category.show', $category->slug) }}"
                                class="text-decoration-none text-dark link-primary">
                                {{ $category->name }}
                            </a>
                            {{-- لاحظ التغيير هنا: post_count وليس posts_count --}}
                            <span class="text-muted small">{{ $category->post_count }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
