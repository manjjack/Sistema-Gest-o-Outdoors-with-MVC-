<?php

require_once '../repositories/OutdoorRepository.php';

class OutdoorServices {

    private $outdoorRepository = NULL;

    public function __construct() {
        $this->outdoorRepository = new OutdoorRepository();
    }

    public function registar(Outdoor $outdoor) {
        try {
            $this->outdoorRepository->registarOutdoor($outdoor);
        } catch (Exception $e) {
            echo "An error occurred while: " . $e->getMessage();
        }
    }

    public function update(Outdoor $outdoor) {
        try {
            $this->outdoorRepository->updateOutdoor($outdoor);
        } catch (Exception $e) {
            echo "An error occurred while: " . $e->getMessage();
        }
    }

    public function getAll() {
        try {
            return $this->outdoorRepository->getAllOutdoor();
        } catch (Exception $e) {
            echo "An error occurred while: " . $e->getMessage();
        }
    }

    public function getById($id) {
        try {
            return $this->outdoorRepository->getOutdoorById($id);
        } catch (Exception $e) {
            echo "An error occurred while:  " . $e->getMessage();
        }
    }


    public function delete($id) {
        try {
            $this->outdoorRepository->deleteOutdoor($id);
        } catch (Exception $e) {
            echo "An error occurred while: " . $e->getMessage();
        }
    }
}


