<div class="tab-pane fade succ_reset" id="list-settings" role="tabpanel" aria-labelledby="list-settings-list">
    <div class="set_change">
        <div class="set_change_content">
            <h2>Изменить пароль</h2>
            <p>Вы можете изменить свой пароль, указав старый пароль и введя и подтвердив новый пароль.
            </p>
        </div>
        <a href="#changepas" class="fancybox">
            <button class="set_change_btnfirst">Изменить</button></a>
    </div>
    <div id="changepas" style="display:none" class="modal_block">
        <div>
            <h3> Изменить пароль</h3>
        </div>
        <hr>
        <p>Введите свой текущий пароль, новый пароль, и повторите ввод нового пароля, чтобы исключить ошибки.
        </p>
        <label>
            Текущий пароль
            <input type="password" name="current_password" id="current_password" required>
        </label>
        <label>
            Новый пароль
            <input type="password" name="new_password" id="txtNewPassword" required>
            <div class="registrationFormAlert" style="color:red;" id="CheckCount" ></div>
        </label>
        <label>
            Повторите пароль
            <input type="password" name="repeat_password" id="txtConfirmPassword" required>
           <div class="registrationFormAlert" style="color:red;" id="CheckPasswordMatch"></div>
        </label>

        <div class="d-flex mx-auto">
            <button class="btnmodal reset_password" data-fancybox-close> Изменить пароль</button>
        </div>
    </div>
    <hr>
    <div class="set_change">
        <div class="set_change_content">
            <h2>Изменить электронную почту</h2>
            <p>Чтобы изменить адрес электронной почты, укажите новый адрес, на который вам будет отправлено письмо для подтверждения.
            </p>
        </div>
        <a href="#changemail" class="fancybox">
            <button class="set_change_btnfirst">Изменить</button></a>
    </div>
    <div id="changemail" style="display:none" class="modal_block">
        <div>
            <h3> Изменить электронную почту</h3>
        </div>
        <hr>
        <p>Введите ваш пароль и новый адрес электронной почты, на который вам придет подтверждающее письмо.
        </p>

            <label>
                Ваш пароль
            <form  autocomplete="off">
                <input type="password" id="password_email" required>
            </form>
            </label>
            <label>
                Ваш новый адрес эл. почты
                <form  autocomplete="off">
                <input type="email" id="edit_email" required>
            </form>
            </label>

            <div class="d-flex mx-auto">
                <button class="btnmodal" id="email_submit" data-fancybox-close type="submit"> Послать подтверждающее письмо</button>

    </div>
</div>

<hr>
<div class="set_change">
    <div class="set_change_content">
        <h2>Удалить учетную запись</h2>
        <p>Вы можете навсегда удалить свою учетную запись. Ваши объявления и вся другая информация будут удалены, и вы никогда не сможете снова использовать этот адрес электронной почты на .....
            .
        </p>
    </div>
    <a href="#confirm" class="fancybox">
        <button class="set_change_secbtn">Подтвердить</button></a>
</div>
<hr>
<div id="confirm" style="display:none" class="modal_block">
    <div>
        <h3> Удалить учетную запись</h3>
    </div>
    <hr>
    <p>Вам будет послано подтверждающее письмо для удаления вашей учетной записи.
        <span>Если вы продолжите эту операцию, то ваша учетная запись, объявления, сообщения и вся другая информация будут удалены. Подтвержденные номера телефонов нельзя будет использовать в другой учетной записи в течение долгого времени. Повторная регистрация с адреса электронной почты ingebora81@gmail.com будет невозможна.</span>
    </p>
        <label>
            Ваш пароль
            <input type="password" id="delete_profile" name="delete_profile" required>
        </label>
        <div class="d-flex mx-auto">
            <button class="btnmodal" id="delete_profile_confirm" type="submit"> Послать подтверждающее письмо</button>
</div>
</div>
