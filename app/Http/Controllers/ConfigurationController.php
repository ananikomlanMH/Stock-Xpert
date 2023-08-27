<?php

namespace App\Http\Controllers;

use App\Components\Router\Router;
use App\Components\Viewer\View;
use App\Helpers\ResponseResolver\ResponseResolverHelper;
use App\Models\Configurations;

class ConfigurationController
{

    public function index(): string
    {
        $configuration = Configurations::firstOrCreate();
        return View::render('settings.Configuration.index', compact('configuration'));
    }

    public function edit()
    {
        $configuration = Configurations::firstOrCreate();

        $old_header = $configuration->header;
        $old_footer = $configuration->footer;

        $data = $_POST;
        $file = $_FILES;

        $data['header'] = $old_header;
        $data['footer'] = $old_footer;

        if (!empty($file['header']['name'])) {
            if ($file['header']['size'] <= 5000000) {
                $info_img = pathinfo($file['header']['name']);
                $extension = $info_img['extension'];
                $extension_array = array('png', 'gif', 'jpg', 'jpeg');
                if (in_array($extension, $extension_array)) {
                    $fileName = "header" . "_" . time() . rand() . '.' . $extension;
                    $dir = dirname(__DIR__, 3) . DIRECTORY_SEPARATOR . "public/vendors/images/uploads/";
                    $chemin1 = $dir . DIRECTORY_SEPARATOR . $fileName;
                    $data['header'] = $fileName;
                } else {
                    return ResponseResolverHelper::sendResponse([
                        'type' => 'error',
                        'message' => "Fichier non valide",
                        'redirection' => Router::route('settings.configuration')
                    ]);
                }
            }
        }

        if (!empty($file['footer']['name'])) {
            if ($file['footer']['size'] <= 5000000) {
                $info_img = pathinfo($file['footer']['name']);
                $extension = $info_img['extension'];
                $extension_array = array('png', 'gif', 'jpg', 'jpeg');
                if (in_array($extension, $extension_array)) {
                    $fileName = "footer" . "_" . time() . rand() . '.' . $extension;
                    $dir = dirname(__DIR__, 3) . DIRECTORY_SEPARATOR . "public/vendors/images/uploads/";
                    $chemin2 = $dir . DIRECTORY_SEPARATOR . $fileName;
                    $data['footer'] = $fileName;
                } else {
                    return ResponseResolverHelper::sendResponse([
                        'type' => 'error',
                        'message' => "Fichier non valide",
                        'redirection' => Router::route('settings.configuration')
                    ]);
                }
            }
        }

        $request = $configuration->update($data);
        if ($request) {
            if (!empty($chemin1)) move_uploaded_file($file['header']['tmp_name'], $chemin1);
            if (!empty($chemin2)) move_uploaded_file($file['footer']['tmp_name'], $chemin2);

            if ($old_header !== null && !empty($chemin1)) {
                try {
                    unlink(dirname(__DIR__, 3) . "/public/vendors/images/uploads/" . $old_header);
                } catch (\Exception $e) {

                }
            }

            if ($old_footer !== null && !empty($chemin2)) {
                try {
                    unlink(dirname(__DIR__, 3) . "/public/vendors/images/uploads/" . $old_footer);
                } catch (\Exception $e) {

                }
            }

            return ResponseResolverHelper::sendResponse([
                'redirection' => Router::route('settings.configuration'),
                'type' => 'success',
                'message' => 'la ressource a été modifié avec succès'
            ]);
        } else {
            return ResponseResolverHelper::sendResponse([
                'redirection' => Router::route('settings.configuration'),
                'type' => 'error',
                'message' => 'Erruer lors de la modification de ressource. Veuillez-ressayer plutard !'
            ]);
        }
    }
}