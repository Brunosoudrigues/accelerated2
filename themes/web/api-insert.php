<?php 
 $this->layout("_theme",[
   "categories" => $categories
]);
?>
<body>
    
    <div class="container">
        <div class="form__image">
        <img src="./assets/web/img/main-logo-1.png" class="logo" alt="">

            <!-- <img src="./assets/assetsRegister/img/undraw_online_stats_0g94.png" alt=""> -->
        </div>
        <div class="form">
            <form id="form-register" method="post">
                <div class="form__header">
                    <div class="title">
                        <h1>Cadastre-se</h1>
                    </div>   
                </div>
                <div class="input__group">
                    <div class="input__box">
                        <label for="name">Nome</label>
                        <input id="name" name="name" type="text" placeholder="Digite seu nome" required>
                    </div>

                    <div class="input__box">
                        <label for="email">E-mail</label>
                        <input id="email" name="email" type="email" placeholder="Digite seu e-mail" required>
                    </div>
                    
                    <div class="input__box">
                        <label for="password">Senha</label>
                        <input id="password" name="password" type="password" minlength="8" placeholder="Digite sua senha" required>
                    </div>

                </div>

                <div class="response">
					<p class="response__p" ></p>
				</div>
                
                <div class="continue__button"> 
                    <button type="submit"><a>Cadastrar</a></button>
                </div>
                <div class="login__button">
                    <a href="<?= url("/login");?>">Ja tem cadastro? entre.</a>
                    </div> 
            </form>
        </div>
    </div>
    
    
    <script type="text/javascript" async>
    const form = document.querySelector("#form-register");

    form.addEventListener("submit", async (e) => {
        e.preventDefault();
        const data = await fetch(`<?= url("api/user");?>`,{
            method: "POST",
            body: new FormData(form)
        });
        const user = await data.json();
        console.log(user);

    });
    </script>
    </body>''