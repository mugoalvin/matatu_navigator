<?php
$readRoutes = new managerClass;
$routeData = $readRoutes->readRouteData($_SESSION["loginInManager"]->company_id);
?>