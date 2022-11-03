<?php
    // require_once ('../index.php');
    require_once('../controller/read.php');
    require_once('../controller/readYear.php');
    require_once('../controller/readSpecialization.php');
    require_once('../controller/readFilter.php');
    require_once('../helpers/tableHelper.php')
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Annuaire Normandie Web School</title>
    <link rel="stylesheet" href="styles/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body>
<nav class="navigation_bar">
    <div class="wrapper">
        <div class="navigation">
            <a href="index.php" id="navigation_logo"><img src="images/Logo_nws" class="logo" alt="logo_header"></a>
            <!-- <div class="navigation_deroulante" id="navigation_responsive">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div> -->
        </div>
    </div>
</nav>

<div class="wrapper">
    <div class="heading">
        <div class="heading_list">
            <h1>Liste d'étudiants</h1>
        </div>

        <!-- Boutons action filtrage et ajout d'un nouvel étudiant -->
        <div class="heading_button">
            <a href="form.php" class="button button_green">Ajout d'un nouvel étudiant</a>
        </div>
    </div>
    <form action="" class="search-container">
        <div class="search-bar">
            <button class="btn w-auto" type="submit" name="search">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#8F8F8F" class="bi bi-search" viewBox="0 0 16 16">
                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                </svg>
            </button>
            <input type="text" class="search" name="q" placeholder="Rechercher un étudiant dans la liste" value="<?= htmlentities($_GET['q'] ?? null) ?>">
        </div>
    </form>

    <!-- Filtre liste étudiante -->
    <form action="" method="GET" class="filter-form">
        <div class="card">
            <div class="card-header">
                <h3>Filtre</h3>
                <button class="button button_red width-30" type="submit">Filtrer</button>
            </div>
            <div class="card-body">
                <div class="bloc">
                    <h4 class="filter-title">Année</h4>
                    <?php foreach($readYear as $checklist)
                    {
                        $checked = [];
                        if(isset($_GET['checkboxYear']))
                        {
                            $checked = ($_GET['checkboxYear']);
                        }
                        ?>
                        <div class="">
                            <div class="filter-year">
                                <input type="checkbox" name="checkboxYear[]" value="<?= $checklist->get_id(); ?>"
                                    <?php if(in_array($checklist->get_id(), $checked)) {
                                        // echo "checked!";
                                    }?>
                                />
                                <?= $checklist->get_name(); ?>
                            </div>
                        </div><?php
                    } ?> 
                </div>
    
                <div class="bloc">
                    <h4 class="filter-title">Spécialisation</h4> 

                        <?php foreach($readSpecialization as $checklist)
                        {
                            $checked = [];
                            if(isset($_GET['checkboxSpecialization']))
                            {
                                $checked = ($_GET['checkboxSpecialization']);
                            }
                            ?>
                            <div class="">
                                <div class="filter-specialization">
                                    <input type="checkbox" name="checkboxSpecialization[]" value="<?= $checklist->get_id(); ?>"
                                        <?php if(in_array($checklist->get_id(), $checked)) {
                                            // echo "checked!";
                                        }?>
                                    />
                                    <?= $checklist->get_name(); ?>
                                </div>
                            </div><?php
                        } ?> 
                </div>
            </div>
        </div>
    </form>

    <!-- Liste étudiants  -->
    <table class="table table-striped">        
        <thead>
        <p class="text-description">Vous pouvez tirer par ordre alphabétique en cliquant sur le nom des colonnes</p>

            <tr>
                <th><?= TableHelper::sort('id', 'ID', $_GET) ?></th>
                <th><?= TableHelper::sort('firstname', 'Prénom', $_GET) ?></th>
                <th><?= TableHelper::sort('name', 'Nom', $_GET) ?></th>
                <th><?= TableHelper::sort('emailAddress', 'Adresse mail', $_GET) ?></th>
                <th><?= TableHelper::sort('phoneNumber', 'Téléphone', $_GET) ?></th>
                <th><?= TableHelper::sort('year', 'Année', $_GET) ?></th>
                <th><?= TableHelper::sort('specialization', 'Spécialité', $_GET) ?></th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>

            <?php 
                $readFilteredStudents = [];
                if((isset($_GET['checkboxYear'])) == TRUE || (isset($_GET['checkboxSpecialization'])) == TRUE)
                {
                    if(isset($_GET['checkboxYear'])) 
                    {
                        $yearFilters = $_GET['checkboxYear'];
                    }
                    else
                    {
                        $yearFilters = [0];
                    }
                    if(isset($_GET['checkboxSpecialization'])) 
                    {
                        $specializationFilters = $_GET['checkboxSpecialization'];
                    }
                    else
                    {
                        $specializationFilters = [0];
                    }
                    
                    // $studentCheck = $_GET['checkboxSpecialization'];
                    
                    // foreach($studentCheck as $studentChecked) 
                    // {
                    //     echo $studentChecked;
                    // }
                    // $studentCheck = [];
                    // $studentCheck = $_GET['checkboxYear'];
                    
                    foreach($yearFilters as $yearFilter):
                    {
                        foreach($specializationFilters as $specializationFilter): 
                        {
                            //echo $studentChecked;
                            // echo $student = "SELECT * FROM `student` WHERE year_id='$studentChecked' ";
                            $readFilteredStudents = $readFilter->readFilterStudents($yearFilter,$specializationFilter);
                            // $buffer = $readFilter->readFilterStudents($studentChecked);
                            //rray_push($readFilteredStudents,$buffer);
                            foreach($readFilteredStudents as $row):
                                ?>
                                    <tr>
                                        <td><?= $row->get_id() ?></td>
                                        <td><?= $row->get_firstname() ?></td>
                                        <td><?= $row->get_name() ?></td>
                                        <td><?= $row->get_emailAddress() ?></td>
                                        <td><?= $row->get_phoneNumber() ?></td>
                                        <td><?= $row->get_year() ?></td>
                                        <td><?= $row->get_specialization() ?></td>
                                        <td class="actions">
                                            <form action="../view/formUpdate.php" method="POST">
                                            <!-- <form action="../controller/update.php" method="POST"> -->
                                                <input type="hidden" name="id" value="<?php echo $row->get_id(); ?>">
                                                <button type="submit" name="update" value="update" title="Editer la ligne" class="btn btn-light">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#8F8F8F" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                                    </svg>
                                                </button>
                                            </form>
                                            <form action="../controller/delete.php" method="POST">
                                                <input type="hidden" name="id" value="<?php echo $row->get_id(); ?>">
                                                <button type="submit" name="delete" value="delete" title="Supprimer la ligne" class="btn btn-light">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#8F8F8F" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                                        <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1
                                                        1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                                                    </svg>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php
                            endforeach;
                        }
                        endforeach;
                    }
                    endforeach;
                }
                else
                {
                    foreach($readForm as $row):
                        ?>
                            <tr>
                                <td><?= $row->get_id() ?></td>
                                <td><?= $row->get_firstname() ?></td>
                                <td><?= $row->get_name() ?></td>
                                <td><?= $row->get_emailAddress() ?></td>
                                <td><?= $row->get_phoneNumber() ?></td>
                                <td><?= $row->get_year() ?></td>
                                <td><?= $row->get_specialization() ?></td>
                                <td class="actions">
                                    <form action="../view/formUpdate.php" method="POST">
                                    <!-- <form action="../controller/update.php" method="POST"> -->
                                        <input type="hidden" name="id" value="<?php echo $row->get_id(); ?>">
                                        <button type="submit" name="update" value="update" title="Editer la ligne" class="btn btn-light">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#8F8F8F" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                            </svg>
                                        </button>
                                    </form>
                                    <form action="../controller/delete.php" method="POST">
                                        <input type="hidden" name="id" value="<?php echo $row->get_id(); ?>">
                                        <button type="submit" name="delete" value="delete" title="Supprimer la ligne" class="btn btn-light">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#8F8F8F" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                                <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1
                                                1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                                            </svg>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        <?php
                    endforeach; 
                }
            ?> 
            
        </tbody>
    </table>
</div>