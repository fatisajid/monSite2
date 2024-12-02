<?php

namespace App\Utils;


abstract class AbstractController
{
    protected array $arrayError = [];

    public function redirectToRoute($route)
    {
        http_response_code(303);
        header("Location: {$route} ");
        exit;
    }

    public function isNotEmpty($value)
    {
        if (empty($_POST[$value])) {
            $this->arrayError[$value] = "Le champ $value ne peut pas être vide.";
            return $this->arrayError;
        }
        return false;
    }

    public function checkFormat($nameInput, $value)
    {
        $regexName = '/^[a-zA-Zà-üÀ-Ü -_]{2,255}$/';
        $regexPassword = '/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/';
        $regexRole = '/^[12]$/';
        $regexDateTime = '/^[2][0][2-3][0-9][-][0-1][0-9][-][0-3][0-9][T][0-2][0-9][:][0-6][0-9]$/';
        $regexCategory = '/^[a-zA-Zà-üÀ-Ü -_]{2,255}$/';


        switch ($nameInput) {
            case 'username':
                if (!preg_match($regexName, $value)) {
                    $this->arrayError['username'] = "Merci de renseigner un nom d'utlisateur correcte!";
                }
                break;
            case 'email':
                if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
                    $this->arrayError['email'] = 'Merci de renseigner un e-mail correcte!';
                }
                break;
            case 'password':
                if (!preg_match($regexPassword, $value)) {
                    $this->arrayError['password'] = 'Merci de donné un mot de passe avec au minimum : 8 caractères, 1 majuscule, 1 miniscule, 1 caractère spécial!';
                }
                break;

            case 'role':
                if (!preg_match($regexRole, $value)) {
                    $this->arrayError['role'] = 'Merci de renseigner un role correcte!';
                }
                break;
            case 'created_at':
                if (!preg_match($regexDateTime, $value)) {
                    $this->arrayError['created_at'] = 'Merci de renseigner une date et heure correcte!';
                }
                break;
            case 'category':
                if (!preg_match($regexCategory, $value)) {
                    $this->arrayError['category'] = "Merci de renseigner un category correct!";
                }
                break;
        }
    }

    public function check($nameInput, $value)
    {
        $this->isNotEmpty($nameInput);
        $value = htmlspecialchars($value);
        $this->checkFormat($nameInput, $value);
        return $this->arrayError;
    }
}
