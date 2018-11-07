<template>
    <div>
        <!-- Modal -->
        <div class="modal fade" id="addAttributeModal" tabindex="-1" role="dialog" aria-labelledby="addAttributeModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addAttributeModalLabel">Add Attribute</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/attribute/store" method="post">
                    <div class="modal-body">
                        <input type="hidden" name="_token" class="form-control" :value="token">
                        <div class="form-group">
                            <label for="name">Attribute name</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Create Attribute</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    computed: {
        token(){
            let token = document.querySelector("meta[name='csrf-token']");
            return token.content;
        }
    }
}
</script>

