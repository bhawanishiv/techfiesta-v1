  <div class="modal fade" data-backdrope="static" id="update" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content" style="color:black;">
                    <div class="modal-header">
                        <h4 class="modal-title">Notification &amp; Updates</h4>
                        
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span> 
                        </button>
                    </div>
                    <div class="modal-body" style="color:black; height: 450px; overflow: auto;" >
                        <ul ng-repeat="data in allnotice">
                            <li>{{data.notice}}</li>
                        </ul>
                    </div>

                    <div class="modal-footer">
                        <input type="button" name="cancel" value="Cancel" data-dismiss="modal">
                    </div>
                </div>
            </div>
   </div>