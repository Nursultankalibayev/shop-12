<div id="modalLogin" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Войти в личный кабинет</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                            <label for="email1">Ваш email <span>*</span></label>
                        </div>
                        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                            <input type="email" name="email" id="email1">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                            <label for="password1">Пароль <span>*</span></label>
                        </div>
                        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                            <input type="password" name="password" id="password1">
                        </div>
                    </div>
                </div>
                <div class="reset">
                    <a href="#">Забыли пароль?</a>
                </div>
                <div class="form-group">
                    <button class="send" onclick="FuncObject.sendLogin();">Отправить</button>
                </div>
            </div>
        </div>
    </div>
</div>