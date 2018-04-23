<div id="modalCallback" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Заказать обратный звонок</h4>
        </div>
        <div class="modal-body">
            <p class="top_information">В настоящее время наши консультанты не работают. Вы можете заказать обратный звонок, и мы обязательно Вам позвоним </p>
            <div class="form-group">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <label for="nameCallback">Ваше имя <span>*</span></label>
                    </div>
                    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                        <input type="text" name="name" id="nameCallback">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <label for="phoneCallback">Телефон <span>*</span></label>
                    </div>
                    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                        <input type="text" name="phone" id="phoneCallback">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <button class="send" onclick="FuncObject.sendCallback();">Отправить</button>
            </div>
            </div>
        </div>
    </div>
</div>