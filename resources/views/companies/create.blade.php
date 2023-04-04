<x-app-layout>

    <div class="container">
        <div class="row">
            <div class="col md-12">
                <form action="{{ route('companies.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 offset-3">
                            <input type="text" class="mt-3 form-control @error('Name')
                            is-invalid
                            @enderror" name="Name" placeholder="Name" aria-label="Name" >
                            @error('Name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                            <input type="text" class="mt-3 form-control" name="Email" placeholder="Email" aria-label="Email">
                            <input type="text" class="mt-3 form-control" name="Website" placeholder="Website" aria-label="Website">

                            <input type="file" class="mt-3 form-control @error('Logo')
                                is-invalid
                            @enderror" name="Logo" placeholder="Upload" aria-label="Logo">
                            @error('Logo')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                            <button type="submit" class="mt-3 btn btn-info">Add</button>
                        </div>
                      </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
