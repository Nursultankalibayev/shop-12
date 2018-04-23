<div id="modalRegistration" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Создать учётную запись</h4>
        </div>
        <form action="#" id="registration_web">
            <div class="modal-body">
                <p class="top_information">Создав учётную запись на нашем сайте, Вы будете тратить меньше времени на оформление заказа, сможете хранить несколько адресов доставки, отслеживать состояние заказов, а также многое другое.</p>
                <div class="form-group">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                            <label for="first_name">Ваша фамилия <span>*</span></label>
                        </div>
                        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                            <input type="text" name="first_name" id="first_name">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                            <label for="last_name">Ваше имя <span>*</span></label>
                        </div>
                        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                            <input type="text" name="last_name" id="last_name">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                            <label for="email">Эл. почта <span>*</span></label>
                        </div>
                        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                            <input type="email" name="email" id="email">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                            <label for="phone">Телефон <span>*</span></label>
                        </div>
                        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                            <input type="text" name="phone" id="phone">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                            <label for="password">Пароль <span>*</span></label>
                        </div>
                        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                            <input type="password" name="password" id="password">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                            <label for="password_confirmation">Повтор пароля <span>*</span></label>
                        </div>
                        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                            <input type="password" name="password_confirmation" id="password_confirmation">
                        </div>
                    </div>
                </div>
                <div class="required">
                    <p><span>*</span> Поля для обязательного заполнения</p>
                </div>
                <div class="form-group">
                    <button class="send" onclick="FuncObject.sendRegistration();" type="button">Завершить</button>
                </div>
            </div>
        </form>
    </div>
  </div>
</div>