<?php

namespace App\Http\Controllers\Form;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TestController extends Controller
{

    public function formEditcontact($contact)
    {
        $url= 'https://b24-pswfkp.bitrix24.com.br/rest/1/00c4mwudsl6vq8h4/crm.contact.get';
        $data = http_build_query(array(
            "ID" => $contact,
        ));
        $ch = curl_init();
        curl_setopt_array($ch, array(
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_POST => 0,
            CURLOPT_HEADER => 0,
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => $url,
            CURLOPT_POSTFIELDS => $data,
        ));
        $resultado = json_decode(curl_exec($ch));
        curl_close($ch);

       return view('editContact', [
            'contact' => $resultado
        ]);
    }

    public function formEditCompany($company)
    {
        $url= 'https://b24-pswfkp.bitrix24.com.br/rest/1/00c4mwudsl6vq8h4/crm.company.get';
        $data = http_build_query(array(
            "ID" => $company,
        ));
        $ch = curl_init();
        curl_setopt_array($ch, array(
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_POST => 0,
            CURLOPT_HEADER => 0,
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => $url,
            CURLOPT_POSTFIELDS => $data,
        ));

        $resultado = json_decode(curl_exec($ch));
        curl_close($ch);

        return view('editCompany', [
            'company' => $resultado
        ]);
    }

    public function editCompany($company, Request $request)
    {
        $queryUrl = 'https://b24-pswfkp.bitrix24.com.br/rest/1/00c4mwudsl6vq8h4/crm.company.update';

        $data = http_build_query(array(
            "ID" => $company,
            "fields" => array(
                "TITLE" => $request["nome"]
            ),
            'params' => array("REGISTER_SONET_EVENT" => "Y")
        ));
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_POST => 1,
            CURLOPT_HEADER => 0,
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => $queryUrl,
            CURLOPT_POSTFIELDS => $data,
        ));
        $result = curl_exec($curl);
        curl_close($curl);

        $result = json_decode($result, 1);

        if (array_key_exists('error', $result)) echo "Error saving Lead: ".$result['error_description']."";

        return redirect()->route('br.listCompanies');
    }

    public function editContact($contact, Request $request)
    {
        $queryUrl = 'https://b24-pswfkp.bitrix24.com.br/rest/1/00c4mwudsl6vq8h4/crm.contact.update';

        $data = http_build_query(array(
            "ID" => $contact,
            "fields" => array(
                "NAME" => $request["nome"]
            ),
            'params' => array("REGISTER_SONET_EVENT" => "Y")
        ));
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_POST => 1,
            CURLOPT_HEADER => 0,
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => $queryUrl,
            CURLOPT_POSTFIELDS => $data,
        ));
        $result = curl_exec($curl);
        curl_close($curl);

        $result = json_decode($result, 1);

        if (array_key_exists('error', $result)) echo "Error saving Lead: ".$result['error_description']."";

        return redirect()->route('br.listContacts');

    }


    public function listAllContacts(Request $request)
    {
        $url= 'https://b24-pswfkp.bitrix24.com.br/rest/1/00c4mwudsl6vq8h4/crm.contact.list';
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $resultado = json_decode(curl_exec($ch));
        curl_close($ch);


        return view('listContacts', [
            'contact' => $resultado
        ]);
    }
    public function listAllCompanies(Request $request)
    {
        $url= 'https://b24-pswfkp.bitrix24.com.br/rest/1/00c4mwudsl6vq8h4/crm.company.list';
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $resultado = json_decode(curl_exec($ch));
        curl_close($ch);


        return view('listCompanies', [
            'company' => $resultado
        ]);
    }

    public function deleteCompany($company)
    {
        $queryUrl = 'https://b24-pswfkp.bitrix24.com.br/rest/1/00c4mwudsl6vq8h4/crm.company.delete?ID='.$company;
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_POST => 1,
            CURLOPT_HEADER => 0,
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => $queryUrl,
            CURLOPT_POSTFIELDS => 0,
        ));
        curl_exec($curl);
        curl_close($curl);

        return redirect()->route('br.listCompanies');

    }

    public function formAdd()
    {
        return view('addForm');
    }

    public function deleteContact($contact)
    {
            $queryUrl = 'https://b24-pswfkp.bitrix24.com.br/rest/1/00c4mwudsl6vq8h4/crm.contact.delete?ID='.$contact;

            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_SSL_VERIFYPEER => 0,
                CURLOPT_POST => 1,
                CURLOPT_HEADER => 0,
                CURLOPT_RETURNTRANSFER => 1,
                CURLOPT_URL => $queryUrl,
                CURLOPT_POSTFIELDS => 0,
            ));
            curl_exec($curl);
            curl_close($curl);

            return redirect()->route('br.listContacts');

    }

    public function registerCompany(Request $request)
    {
        $queryUrl = 'https://b24-pswfkp.bitrix24.com.br/rest/1/00c4mwudsl6vq8h4/crm.company.add.json';
        $queryData = http_build_query(array(
            'fields' => array(
                "ORIGIN_ID" => $request['cnpj'],
                "TITLE" => $request['nome_empresa'],
            ),
            'params' => array("REGISTER_SONET_EVENT" => "Y")
        ));

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_POST => 1,
            CURLOPT_HEADER => 0,
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => $queryUrl,
            CURLOPT_POSTFIELDS => $queryData,
        ));
        $result = curl_exec($curl);
        curl_close($curl);

        $result = json_decode($result, 1);

        if (array_key_exists('error', $result)) echo "Error saving Lead: ".$result['error_description']."";

    }

    public function registerContact(Request $request)
    {
        $queryUrl = 'https://b24-pswfkp.bitrix24.com.br/rest/1/00c4mwudsl6vq8h4/crm.contact.add.json';
        $queryData = http_build_query(array(
            'fields' => array(
                "ORIGIN_ID" => $request['cpf'],
                "NAME" => $request['nome'],
                "COMPANY_ID" => $request['cnpj'],
                "PHONE" => array(array("VALUE" => $request['telefone'], "VALUE_TYPE" => "WORK" )),
                "EMAIL" => array(array("VALUE" => $request['email'], "VALUE_TYPE" => "WORK" )),
            ),
            'params' => array("REGISTER_SONET_EVENT" => "Y")
        ));

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_POST => 1,
            CURLOPT_HEADER => 0,
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => $queryUrl,
            CURLOPT_POSTFIELDS => $queryData,
        ));
        $result = curl_exec($curl);
        curl_close($curl);

        $result = json_decode($result, 1);

        if (array_key_exists('error', $result)) echo "Error saving Lead: ".$result['error_description']."";
    }

    public function sendForm(Request $request)
    {
        $this->registerContact($request);
        $this->registerCompany($request);

        return redirect()->route('br.listContacts');
    }


}
