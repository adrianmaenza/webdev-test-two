<template>
    <div>
        <!-- Modal -->
        <div class="modal fade" id="deleteAttributeModal" tabindex="-1" role="dialog" aria-labelledby="deleteAttributeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteAttributeModalLabel">Delete attribue</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    
                    <div class="modal-body">
                        Are you sure you want to delete this Attribute?
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <!-- TODD: update and used post and a form -->
                        <a :href="`/attribute/${att_id}/destroy`"  class="btn btn-danger">Delete</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    props: [
        'att_id'
    ]
}
</script>

