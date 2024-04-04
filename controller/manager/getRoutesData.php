<?php
$readRoutes = new managerClass;
$routeData = $readRoutes->readRouteData($_SESSION["loggedInManager"]->company_id);
?>