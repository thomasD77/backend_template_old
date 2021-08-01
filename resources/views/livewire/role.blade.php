<div>
    <form wire:submit.prevent="submit" method="POST" class="row mb-0">
        <div class="input-group">
            <button  class="btn btn-alt-primary">
                <i class="fa fa-plus"></i>
            </button>
            <input wire:model="name"
                type="text" class="form-control form-control-alt" id="example-group3-input3-alt2" name="role" placeholder="New Role">
            <button  type="submit" class="btn btn-secondary">
                Submit
            </button>
        </div>
    </form>
</div>
