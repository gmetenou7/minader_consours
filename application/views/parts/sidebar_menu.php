<div class="sidebar-menu">

    <?php if(session('users')['statut'] == 'admin'){?>
    <?php }else if(session('users')['statut'] == 'user_note'){?>
    <?php }else if(session('users')['statut'] == 'user_cadidat'){?>
    <?php } ?>

    <?php if(session('users')['statut'] == 'admin'){?>
        <ul class="menu">
            <li class="sidebar-title">Menu</li>

            <li class="sidebar-item active ">
                <a href="<?=base_url('home')?>" class='sidebar-link'>
                    <i class="bi bi-grid-fill"></i>
                    <span>Accueil</span>
                </a>
            </li>
            <li class="sidebar-item active ">
                <a href="<?=base_url('settings')?>" class='sidebar-link'>
                    <i class="bi bi-grid-fill"></i>
                    <span>Parametres</span>
                </a>
            </li>
            <li class="sidebar-item  ">
                <a href="<?=base_url('view');?>" class='sidebar-link'>
                    <i class="bi bi-stack"></i>
                    <span>Utilisateurs</span>
                </a>
            </li>
            <li class="sidebar-item  ">
                <a href="<?=base_url('candidats');?>" class='sidebar-link'>
                    <i class="bi bi-collection-fill"></i>
                    <span>Nouveaux candidats</span>
                </a>
            </li>
            <li class="sidebar-item  ">
                <a href="<?=base_url('lcandidats');?>" class='sidebar-link'>
                    <i class="bi bi-file-earmark-medical-fill"></i>
                    <span>Liste Candidats</span>
                </a>
            </li>
            <li class="sidebar-item  ">
                <a href="<?=base_url('files');?>" class='sidebar-link'>
                    <span class="fa-fw select-all fas"></span>
                    <span>Importer Candidats</span>
                </a>
            </li>
            <li class="sidebar-item  ">
                <a href="<?=base_url('anonymat');?>" class='sidebar-link'>
                <span class="fa-fw select-all fas"></span>
                    <span>Anonymat</span>
                </a>
            </li>
            <li class="sidebar-item  ">
                <a href="<?=base_url('centrecompo');?>" class='sidebar-link'>
                    <i class="bi bi-grid-1x2-fill"></i>
                    <span>Candidat par Centre composition</span>
                </a>
            </li>

            <!--<li class="sidebar-title">Forms &amp; Tables</li>-->
            <li class="sidebar-item  ">
                <a href="<?php echo base_url('fiche');?>" class='sidebar-link'>
                    <i class="bi bi-map-fill"></i>
                    <span>Imprimer Fiches</span>
                </a>
            </li>

            <li class="sidebar-item  ">
                <a href="<?php echo base_url('note'); ?>" class='sidebar-link'>
                    <i class="bi bi-hexagon-fill"></i>
                    <span>Saisir Notes</span>
                </a>
            </li>

            <li class="sidebar-item  ">
                <a href="<?php echo base_url('resultat'); ?>" class='sidebar-link'>
                    <i class="bi bi-file-earmark-spreadsheet-fill"></i>
                    <span>Résultat</span>
                </a>
            </li>

            <li class="sidebar-title">Autre</li>

            <li class="sidebar-item  ">
                <a href="<?=base_url('logout_user');?>" class='sidebar-link'>
                    <i class="bi bi-life-preserver"></i>
                    <span>SE DECONNECTER</span>
                </a>
            </li>

        </ul>
    <?php }else if(session('users')['statut'] == 'user_note'){?>
        <ul class="menu">
            <li class="sidebar-item  ">
                <a href="<?php echo base_url('note'); ?>" class='sidebar-link'>
                    <i class="bi bi-hexagon-fill"></i>
                    <span>Saisir Notes</span>
                </a>
            </li>
            <li class="sidebar-item  ">
                <a href="<?=base_url('logout_user');?>" class='sidebar-link'>
                    <i class="bi bi-life-preserver"></i>
                    <span>SE DECONNECTER</span>
                </a>
            </li>
        </ul>
    <?php }else if(session('users')['statut'] == 'user_cadidat'){?>
        <ul class="menu">
            <li class="sidebar-title">Menu</li>
            <li class="sidebar-item  ">
                <a href="<?=base_url('candidats');?>" class='sidebar-link'>
                    <i class="bi bi-collection-fill"></i>
                    <span>Nouveaux candidats</span>
                </a>
            </li>
            <li class="sidebar-item ">
                <a href="<?=base_url('lcandidats');?>" class='sidebar-link'>
                    <i class="bi bi-file-earmark-medical-fill"></i>
                    <span>Liste Candidats</span>
                </a>
            </li>
            <li class="sidebar-item  ">
                <a href="<?=base_url('logout_user');?>" class='sidebar-link'>
                    <i class="bi bi-life-preserver"></i>
                    <span>SE DECONNECTER</span>
                </a>
            </li>
        </ul>
    <?php } ?>
</div>