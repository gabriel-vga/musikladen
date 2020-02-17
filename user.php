            <li class='dropdown'>
              <a href='#'' class='dropdown-toggle bg clear' data-toggle='dropdown'>
                <span class='thumb-sm avatar pull-right m-t-n-sm m-b-n-sm m-l-sm'>
                  <img src='images/a0.png' alt='avatar'>
                </span>
                <?php $nome = explode(" ",$_SESSION['login']['Nome']); echo $nome[0] ?><b class='caret'></b>
              </a>
              <ul class='dropdown-menu animated fadeInRight'>            
                <li>
                  <a href='signin.html'>Logout</a>
                </li>
              </ul>
            </li>