<!-- Modal -->
<div class="modal fade" id="modalAlert" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="alert " id="modal-content" role="alert">

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" id="alertAction" data-dismiss="modal">OK</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade " ng-if="progress.visible"  id="modalProgress" tabindex="-1" role="dialog" aria-labelledby="modalProgress" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">                 
            <div class="progress" style="height: 2px;">
                <div class="progress-bar brown" role="progressbar" style="width:{{progress.value}}%;" aria-valuenow="1" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
        </div>
    </div>
</div>