<div class="form-group">
    <label for="title">Title</label>
    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="Title" value="{{ old('title') }}" autocomplete="off">
    @error('title')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="article">Article</label>
    <textarea name="article" class="form-control @error('article') is-invalid @enderror" id="article" placeholder="article" value="">{{ old('article') }}</textarea>
    @error('article')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="slug">Slug</label>
    <input type="text" name="slug" class="form-control @error('title_clean') is-invalid @enderror"
        id="slug" placeholder="slug" value="{{ old('slug') }}" autocomplete="off">
    @error('slug')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="file">File</label>
    <input type="file" name="file" id="file" class="form-control" placeholder="file" value="{{ old('file') }}" data-buttonText="Pilih Cover">
    @error('file')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="author_id">Author</label>
    <select class="form-control select2" name="author_id" id="author_id">
        @foreach ($authors as $id => $author)
        <option value="{{ $author->id }}">{{ $author->display_name }}</option>
        @endforeach
    </select>
    @error('author_id')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="category_id">Category</label>
    <select class="form-control select2" name="category_id" id="category_id">
        @foreach ($categories as $id => $category)
        <option value="{{ $id }}">{{ $category }}</option>
        @endforeach
    </select>
    @error('category_id')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="tag">Tag</label>
    <select class="form-control select2-tag" name="tag[]" id="tag" multiple>
        @foreach ($tags as $tag)
        <option value="{{ $tag->id }}">{{ $tag->name }}</option>
        @endforeach
    </select>
    @error('tag')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="date">Date</label>
    <input type="text" name="date" class="form-control datepicker" id="date">
    @error('date')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>