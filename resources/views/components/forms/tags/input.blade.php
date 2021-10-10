<div class="d-flex">
    <input
        type="text"
        class="form-control"
        id="tag-{{ $id }}"
        name="tags[]"
        aria-label="Tags"
        placeholder="Enter tags"
        value="{{ $text }}"
        maxlength="50"
    >
    <button
        type="button"
        data-tagId="tag-{{ $id }}"
        class="btn btn-danger"
        onclick="deleteTag(this)"
    >
        -
    </button>
</div>
