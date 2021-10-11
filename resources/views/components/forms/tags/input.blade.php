<div class="d-flex tagsBlock">
    <input
        type="text"
        class="form-control tagInput"
        id="tag-{{ $id }}"
        name="tags[]"
        aria-label="Tags"
        placeholder="Enter tags"
        value="{{ $text }}"
        maxlength="50"
        onfocusin="focusTag(this)"
        onfocusout="focusTagOut()"
        autocomplete="off"
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
