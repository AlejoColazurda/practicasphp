
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expense App - Dashboard</title>
    <link rel="stylesheet" href="public/css/user.css">
</head>
<body>
    <?php require 'header.php'; ?>

    <div id="main-container">
        <div id="user-container">
            <div id="side-menu">
                <ul>
                    <li><a href="#info-user-container">Personalizar usuario</a></li>
                    <li><a href="#password-user-container">Password</a></li>
                    <li><a href="#budget-user-container">Presupuesto</a></li>
                </ul>
            </div>

            <div id="user-section-container">
                
                <section id="info-user-container">
                    <form action method="POST">
                        <div class="section">
                            <label for="name">Nombre de usuario</label>
                            <input type="text" name="name" id="name" autocomplete="off" required value="">
                            <div><input type="submit" value="Cambiar nombre" /></div>
                        </div>
                    </form>

                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="section">
                            <label for="photo">Foto de perfil</label>
                            <input type="file" name="photo" id="photo" autocomplete="off" required>
                            <div><input type="submit" value="Cambiar foto de perfil" /></div>
                        </div>
                    </form>
                </section>

                <section id="password-user-container">
                    <form action="" method="POST">
                        <div class="section">
                            <label for="current_password">Password actual</label>
                            <input type="password" name="current_password" id="current_password" autocomplete="off" required>

                            <label for="new_password">Nuevo password</label>
                            <input type="password" name="new_password" id="new_password" autocomplete="off" required>
                            <div><input type="submit" value="Cambiar password" /></div>
                        </div>
                    </form>
                </section>

                <section id="budget-user-container">
                    <form action="user/updateBudget" method="POST">
                        <div class="section">
                            <div class="title">Definir presupuesto</div>
                            <div><input type="number" name="budget" id="budget" autocomplete="off" required value="<?php echo $this->budget ?>"></div>
                            <div><input type="submit" value="Actualizar presupuesto" /></div>
                        </div>
                    </form>
                </section>

            </div><!-- user section container -->
        </div><!-- user container -->

    </div><!-- main container -->
    <script>
        
        const url = location.href;
        const indexAnchor = url.indexOf('#');

        closeSections();

        if(indexAnchor > 0){
            const anchor = url.substring(indexAnchor);
            document.querySelector(anchor).style.display = 'block';

            document.querySelectorAll('#side-menu a').forEach(item =>{
                if(item.getAttribute('href') === anchor){
                    item.classList.add('option-active');
                }
            });
        }else{
            document.querySelector('#info-user-container').style.display = 'block';
            document.querySelectorAll('#side-menu a')[0].classList.add('option-active');
        }

        document.querySelectorAll('#side-menu a').forEach(item =>{
            item.addEventListener('click', e =>{
                closeSections();
                const anchor = e.target.getAttribute('href');
                document.querySelector(anchor).style.display = 'block';
                //e.target.setAttribute('class', 'option-active');
                e.target.classList.add('option-active');
            });
        });

        function closeSections(){
            const sections = document.querySelectorAll('section');
            sections.forEach(item =>{
                item.style.display="none";
            });
            document.querySelectorAll('.option-active').forEach(item =>{
                item.classList.remove('option-active');
            });
        }
        
                            
        
    </script>
</body>
</html>