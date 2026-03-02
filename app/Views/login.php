<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Member Login</title>
 <style>
    /* Reset y Base */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Poppins', sans-serif, Arial;
    }

    body {
        background: linear-gradient(135deg, #8e44ad, #d35400); 
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        overflow: hidden;
    }

    /* Contenedor Principal */
    .login-container {
        background-color: white;
        width: 960px;
        max-width: 95%;
        min-height: 550px;
        border-radius: 10px;
        display: flex;
        box-shadow: 0 5px 20px rgba(0,0,0,0.2);
        overflow: hidden;
    }

    /* Lado Izquierdo - Ilustración */
    .login-left {
        flex: 1;
        background-color: #fff;
        display: flex;
        justify-content: center;
        align-items: center;
        position: relative;
    }

    .icon-circle {
        width: 320px;
        height: 320px;
        background: #f2f2f2;
        border-radius: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 1;
    }

    /* Simulación de Laptop de la imagen */
    .laptop-icon {
        width: 160px;
        height: 100px;
        background: #505050;
        border-radius: 5px;
        border: 4px solid #333;
        position: relative;
    }
    .laptop-icon::after {
        content: '';
        position: absolute;
        bottom: -10px;
        left: -20px;
        width: 200px;
        height: 6px;
        background: #bdc3c7;
        border-radius: 3px;
    }
    .user-icon {
        width: 40px;
        height: 40px;
        border: 3px solid #fff;
        border-radius: 50%;
        margin: 15px auto 5px;
        position: relative;
    }
    .user-icon::after {
        content: '';
        position: absolute;
        bottom: -12px;
        left: 50%;
        transform: translateX(-50%);
        width: 30px;
        height: 12px;
        border: 3px solid #fff;
        border-bottom: 0;
        border-radius: 15px 15px 0 0;
    }

    /* Formas decorativas (Triángulos y Círculos) */
    .floating-shape { position: absolute; opacity: 0.5; }
    .shape-1 { top: 20%; left: 20%; width: 15px; height: 15px; border: 3px solid #00dbde; border-radius: 50%; }
    .shape-2 { bottom: 20%; left: 15%; width: 0; height: 0; border-left: 8px solid transparent; border-right: 8px solid transparent; border-bottom: 14px solid #8cc63f; }
    .shape-3 { top: 40%; right: 10%; width: 0; height: 0; border-left: 8px solid transparent; border-right: 8px solid transparent; border-bottom: 14px solid #8cc63f; transform: rotate(90deg); }
    .shape-4 { top: 10%; left: 50%; width: 12px; height: 12px; border: 2px solid #ccc; }

    /* Lado Derecho - Formulario */
    .login-right {
        flex: 1;
        padding: 50px 70px;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .login-right h2 {
        text-align: center;
        font-size: 26px;
        margin-bottom: 35px;
        color: #333;
        font-weight: 700;
    }

    .login-right h3 {
        font-size: 11px;
        color: #bbb;
        text-align: center;
        margin-top: -25px;
        margin-bottom: 25px;
        font-weight: 400;
    }

    /* Inputs Estilizados */
    .form-group { margin-bottom: 15px; }
    
    .input-wrapper { position: relative; }

    .input-wrapper input {
        width: 100%;
        padding: 15px 15px 15px 50px;
        background: #f1f1f1;
        border: none;
        border-radius: 25px;
        font-size: 15px;
        outline: none;
        transition: 0.3s;
    }

    .input-wrapper input:focus { background: #e8e8e8; }

    /* Iconos dentro de inputs */
    .input-wrapper::before {
        position: absolute;
        left: 20px;
        top: 50%;
        transform: translateY(-50%);
        font-size: 18px;
        color: #666;
        z-index: 2;
    }

    /* Diferenciar iconos por tipo de input */
    .form-group:nth-of-type(1) .input-wrapper::before { content: '✉'; }
    .form-group:nth-of-type(2) .input-wrapper::before { content: '🔒'; }

    /* Botón Login */
    .login-btn {
        width: 100%;
        background-color: #57b846; /* El verde exacto de la imagen */
        color: white;
        padding: 15px;
        border: none;
        border-radius: 25px;
        font-size: 16px;
        font-weight: bold;
        text-transform: uppercase;
        cursor: pointer;
        margin-top: 10px;
        transition: background 0.3s;
    }

    .login-btn:hover { background-color: #333; }

    /* Links inferiores */
    .forgot-link {
        text-align: center;
        margin-top: 20px;
        font-size: 13px;
        color: #666;
    }
    .forgot-link a { text-decoration: none; color: #666; }
    .forgot-link a:hover { color: #57b846; }

    .create-account {
        text-align: center;
        margin-top: 50px;
        font-size: 14px;
    }
    .create-account a {
        text-decoration: none;
        color: #333;
        font-weight: 500;
    }
    .create-account a:hover { color: #57b846; }

    /* Estilos para alertas de PHP/CodeIgniter */
    .alert {
        padding: 10px;
        border-radius: 8px;
        margin-bottom: 15px;
        font-size: 13px;
        text-align: center;
    }
    .alert-danger { background-color: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; }
    .alert-success { background-color: #d4edda; color: #155724; border: 1px solid #c3e6cb; }

    /* Responsive básico */
    @media (max-width: 768px) {
        .login-left { display: none; }
        .login-container { width: 400px; }
    }
</style>
</head>
<body>
    <div class="login-container">
        <div class="login-left">
            <div class="floating-shape shape-1"></div>
            <div class="floating-shape shape-2"></div>
            <div class="floating-shape shape-3"></div>
            <div class="floating-shape shape-4"></div>
            
            <div class="icon-circle">
                <div class="laptop-icon">
                    <div class="laptop-screen">
                        <div class="user-icon"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="login-right">
            <h2>Member Login </h2>
            <h3>test@test.com / password123</h3>

            <?php if (session()->getFlashdata('error')): ?>
                <div class="alert alert-danger">
                    <?= session()->getFlashdata('error') ?>
                </div>
            <?php endif; ?>

            <?php if (session()->getFlashdata('success')): ?>
                <div class="alert alert-success">
                    <?= session()->getFlashdata('success') ?>
                </div>
            <?php endif; ?>

            <?php if (session()->getFlashdata('errors')): ?>
                <div class="alert alert-danger">
                    <?php foreach(session()->getFlashdata('errors') as $error): ?>
                        <div><?= esc($error) ?></div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <form action="<?= base_url('login') ?>" method="POST">
                <?= csrf_field() ?>
                
                <div class="form-group">
                    <div class="input-wrapper">
                        <span class="input-icon"></span>
                        <input type="email" name="email" placeholder="Email" value="<?= old('email') ?>" required>
                    </div>
                </div>

                <div class="form-group">
                    <div class="input-wrapper">
                        <span class="input-icon"></span>
                        <input type="password" name="password" placeholder="Password" required>
                    </div>
                </div>

                <button type="submit" class="login-btn">Login</button>

                <div class="forgot-link">
                    Forgot <a href="<?= base_url('forgot-password') ?>">Username / Password?</a>
                </div>

                <div class="create-account">
                    <a href="<?= base_url('register') ?>">Create your Account →</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>