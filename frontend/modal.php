<div id="modal-center11" class="uk-flex-top" uk-modal="esc-close:false;bg-close:false;">
        <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical">

        <button class="uk-modal-close-default" type="button" uk-close></button>

        <div class="">
		<div class="container-login100" >
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54" style="height: 700px;">
				<form class="login100-form validate-form" name="loginUsuario" method="post" action="doLogin.php">
					<span class="login100-form-title p-b-49">
						<i class="fa fa-user-circle-o"></i>
					 </span>
                    <input type="hidden" value="finalizar_compra.php" name="path">
					<div class="wrap-input100 validate-input m-b-23" data-validate = "E-mail Institucional ou RA inválido">
						<span class="label-input100">Usuário</span>
						<input class="input100" type="text" name="usuario" placeholder="Digite seu Usuário" required>
						<span class="focus-input100" data-symbol="&#xf206;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Senha inválida.">
						<span class="label-input100">Senha</span>
						<input class="input100" type="password" name="senha" placeholder="Digite sua senha" required>
						<span class="focus-input100" data-symbol="&#xf190;"></span>
					</div>
					
					<div class="text-right p-t-8 p-b-31 m-b-23">
						<a href="#" style="text-decoration: underline;">
							Esqueceu sua senha?
						</a>
					</div>
					
					<div class="contain-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn" type="submit" name="submit">
								Entrar
							</button>
						</div>
					</div>

					<div class="txt1 text-center p-t-54 p-b-20">
						<span>
							SIGA-NOS NAS REDES SOCIAIS
						</span>
					</div>

					<div class="flex-c-m">
						<a href="#" class="login100-social-item bg1">
							<i class="fa fa-facebook"></i>
						</a>

						<a href="#" class="login100-social-item bg2">
							<i class="fa fa-twitter"></i>
						</a>

						<a href="#" class="login100-social-item bg3">
							<i class="fa fa-google"></i>
						</a>
					</div>

					<div class="flex-col-c p-t-10">

						<a href="../cadastro/cadastro.html" class="txt2">
							Cadastre-se
						</a>
					</div>
				</form>
			</div>
		</div>
	    </div>

</div>
</div>

<div id="modal-center12" class="uk-flex-top" uk-modal="esc-close:false;bg-close:false;">
    <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical" >

        <button class="uk-modal-close-default" type="button" uk-close></button>

		<div class="head">
        <a href="payment.html"><img src="../icones/images/back-black.svg" class="back" alt=""></a>
        <div class="text">
            Adicionar Novo Cartão
        </div>
    </div>
        <div class="spacescroll" style='padding:0;'>
            <div class="cCard">
                <img src="../icones/images/Creditcard.svg" alt="">
                <div id="cnum_display">6677 8765 3456 1122</div>
                <div id="cname_display">Jair Bolsonaro</div>
                <div id="cval_display">12 20</div>
            </div>
            <div class="blank"></div>
			<form method="POST" action="salvarCartao.php">
            	<div class="ifield MR">
                <img src="../icones/images/Nounc.svg" alt="">
                <!-- <label>Nome do Titular</label> -->
                <input  type="text" class="input" id="cname" placeholder="Nome do Titular" name='cname'>
              </div>
              <div class="ifield MR">
                <img src="../icones/images/Nounc.svg" alt="">
                <!-- <label>Numero do Cartao</label> -->
                <input  type="text" class="input" id="cnum" name='cnum' placeholder="Numero do Cartão" maxlength="19">
              </div>
			  <div class="ifield MR">
			  <img src="../icones/images/Nounc.svg" alt="">
							<label for="estado" style='position:relative;' >Bandeira do Cartão</label>
							<select style='color: #ABA5A5;'  name="bandeira" class="input">
								<option value="">Selecione</option>
								<option value="MasterCard">MasterCard</option>
								<option value="Visa">Visa</option>
								<option value="Maestro">Maestro</option>
								<option value="Amereican Express">American Express</option>
							</select>
				</div>
              <div class="ifield MR">
                <img src="../icones/images/Nounc.svg" alt="">
                <!-- <label style='position:relative;' >Valido até</label> -->
                <input  style='color: #ABA5A5;' type="date" class="input" placeholder="Válido até" name='cval' id="cval" maxlength="5">
              </div>
              <div class="ifield MR">
                <img src="../icones/images/Nounc.svg" alt="">
                <!-- <label>CVV/CVC ( 3 ou 4 digitos)</label> -->
                <input  type="text" class="input" name='cvc' placeholder="CVV/CVC ( 3 ou 4 digitos)" maxlength="4">
              </div>
              <div class="ifield MR">
                <button class="btn3"><span>ADICIONAR NOVO CARTÃO</span></button>
                </div>
			</form>
        </div>
    </div>
</div>

<div id="modal-center13" class="uk-flex-top" uk-modal="esc-close:false;bg-close:false;">
    <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical" >

        <button class="uk-modal-close-default" type="button" uk-close></button>

		<div class="head">
        <a href="payment.html"><img src="../icones/images/back-black.svg" class="back" alt=""></a>
        <div class="text">
            Pagar
        </div>
    </div>
        <div class="spacescroll" style='padding:0;'>
            <div class="cCard">
                <img src="../icones/images/Creditcard.svg" alt="">
                <div id="cnum_display">6677 8765 3456 1122</div>
                <div id="cname_display">Jair Bolsonaro</div>
                <div id="cval_display">12 20</div>
            </div>
            <div class="blank"></div>
			<form method="POST" action="pagar.php">
            	<div class="ifield MR">
                <img src="../icones/images/Nounc.svg" alt="">
                <!-- <label>Nome do Titular</label> -->
                <input  type="text" class="input" placeholder="Senha" name='senha' required>
              </div>
              <div class="ifield MR">
                <button class="btn3"><span>PAGAR</span></button>
                </div>
			</form>
        </div>
    </div>
</div>

<div id="modal-center14" class="uk-flex-top" uk-modal>
    <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical">

        <button class="uk-modal-close-default" type="button" uk-close></button>

		<div class="pod">
            <div class="outer">
                <div class="popupImg uk-flex uk-flex-center">
                    <img src="../icones/images/orderSuccessPopup.svg" alt="">
                </div>
                <div class="welcome-head noPad">
                    <span class="welcome-head-head">Pedido Realizado</span>
                    <span class="caption">Acompanhe seu pedido e aproveite!</span>
                </div>  
                <div class="popupLink uk-flex uk-flex-center" style="padding-top:30px;">
                    <a href="#">Ver pedidos realizados</a>
                </div>
                <div class="ifield bottomPOP">
                    <button class="btn3"><span>ACOMPANHAR PEDIDO</span></button>
                    </div>
            </div>
        </div>

    </div>
</div>


