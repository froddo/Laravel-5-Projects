<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-3">
    <div class="container">
        <a class="navbar-brand" href="/"><img src="https://images.cooltext.com/5086771.png" height="25" width="160"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link {{Request::is('yoga') ? 'active' : ''}}" href="/yoga">Йога</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{Request::is('food') ? 'active' : ''}}" href="/food">Здравословно</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{Request::is('hobbies') ? 'active' : ''}}" href="/hobbies">Хоби</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{Request::is('music') ? 'active' : ''}}" href="/music">Музика</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{Request::is('blog') ? 'active' : ''}}" href="/blog">Блог</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link {{Request::is('post') ? 'active' : ''}}" href="/post">Добави</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{Request::is('contact') ? 'active' : ''}}" href="/contact">Контакти</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{Request::is('about') ? 'active' : ''}}" href="/about">За Мен</a>
                </li>
            </ul>
        </div>
    </div>
</nav>