<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>XQDL Mechanics System</title>
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    
    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }
        
        .full-height {
            height: 100vh;
        }
        
        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }
        
        .position-ref {
            position: relative;
        }
        
        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }
        
        .content {
            text-align: center;
        }
        
        .title {
            font-size: 84px;
        }
        
        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }
        
        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
    <div class="flex-center position-ref full-height">
        <?php if(Route::has('login')): ?>
        <div class="top-right links">
            <?php if(auth()->guard()->check()): ?>
            <?php else: ?>
            <a href="<?php echo e(route('login')); ?>">Login</a>
            
            <?php if(Route::has('register')): ?>
            <a href="<?php echo e(route('register')); ?>">Register</a>
            <?php endif; ?>
            <?php endif; ?>
        </div>
        <?php endif; ?>
        
        <div class="content">
            <div class="title m-b-md">
                XQDL Mechanics System
            </div>
            
            
            <div class="row">
                <div class="links">
                    <a href="<?php echo e(route('pessoa.index')); ?>">Pessoas</a>
                    <a href="<?php echo e(route('servico.index')); ?>">Serviços</a>
                    <a href="<?php echo e(route('marca.index')); ?>">Marcas</a>
                    <a href="<?php echo e(route('veiculo.index')); ?>">Veículos</a>                
                    <a href="<?php echo e(route('produto.index')); ?>">Produtos</a>               
                </div>
            </div>
            <br>
            <div class="row">
                <div class="links">
                    <a href="<?php echo e(route('venda.index')); ?>" style="font-size:20px">Vendas</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<?php /**PATH G:\Meu Drive\Univates\Gerência de Configuração de Software\Projetos-Laravel\mecanica\resources\views/welcome.blade.php ENDPATH**/ ?>