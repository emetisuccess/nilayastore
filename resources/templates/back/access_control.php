<?php
if (!isset($_SESSION['user_role']) || $_SESSION['user_role'] !== "admin") {
    redirect("../index");
}