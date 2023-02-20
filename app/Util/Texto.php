<?php

namespace App\Util;

class Texto
{

    public static function slug($texto, $incluir = '')
    {
        $texto = iconv('UTF-8', 'ASCII//TRANSLIT//IGNORE', $texto);
        $texto = strtolower($texto);
        $texto = Texto::removerAcentos($texto);
        $texto = preg_replace("/[^a-zA-Z0-9 " . $incluir . "\s]/", "", $texto);
        $texto = str_replace(' ', '-', $texto);

        return $texto;
    }

    public static function removerCaracteres($texto)
    {

        $texto = strtolower($texto);
        $texto = Texto::removerAcentos($texto);
        $texto = preg_replace("/[^a-zA-Z0-9\s]/", "", $texto);
        $texto = str_replace(' ', '', $texto);

        return $texto;
    }


    function random_color($start = 0x000000, $end = 0xFFFFFF)
    {
        return sprintf('#%06x', mt_rand($start, $end));
    }

    /** Pede como argumento uma string com acentos e caracteres especiais,
     * e depois remove estes acentos, renomeamento de arquivos. */
    public static function removerAcentos($texto)
    {

        $texto = strtolower($texto);
        $texto = str_replace("á", "a", $texto);
        $texto = str_replace("à", "a", $texto);
        $texto = str_replace("â", "a", $texto);
        $texto = str_replace("ã", "a", $texto);
        $texto = str_replace("ê", "e", $texto);
        $texto = str_replace("è", "e", $texto);
        $texto = str_replace("é", "e", $texto);
        $texto = str_replace("í", "i", $texto);
        $texto = str_replace("ì", "i", $texto);
        $texto = str_replace("î", "i", $texto);
        $texto = str_replace("ò", "o", $texto);
        $texto = str_replace("ó", "o", $texto);
        $texto = str_replace("ô", "o", $texto);
        $texto = str_replace("õ", "o", $texto);
        $texto = str_replace("ú", "u", $texto);
        $texto = str_replace("ñ", "n", $texto);
        $texto = str_replace("~", "", $texto);
        $texto = str_replace("^", "", $texto);
        $texto = str_replace("´", "", $texto);
        $texto = str_replace("`", "", $texto);
        $texto = str_replace("ç", "c", $texto);


        return $texto;
    }

    /**
     * Remove os caracteres especiais de uma string
     *
     * @param string $texto string a ser tratada
     * @return sting string tratada
     */
    public static function remCaracteresEspeciais($texto)
    {

        $texto = strtolower($texto);
        $texto = str_replace("!", "", $texto);
        $texto = str_replace("@", "", $texto);
        $texto = str_replace("#", "", $texto);
        $texto = str_replace("$", "", $texto);
        $texto = str_replace("%", "", $texto);
        $texto = str_replace("¨", "", $texto);
        $texto = str_replace("&", "", $texto);
        $texto = str_replace("*", "", $texto);
        $texto = str_replace("(", "", $texto);
        $texto = str_replace(")", "", $texto);
        $texto = str_replace("-", "", $texto);
        $texto = str_replace("_", "", $texto);
        $texto = str_replace("+", "", $texto);
        $texto = str_replace("=", "", $texto);
        $texto = str_replace("§", "", $texto);
        $texto = str_replace("[", "", $texto);
        $texto = str_replace("]", "", $texto);
        $texto = str_replace("{", "", $texto);
        $texto = str_replace("}", "", $texto);
        $texto = str_replace("ª", "", $texto);
        $texto = str_replace("º", "", $texto);
        $texto = str_replace("?", "", $texto);
        $texto = str_replace("/", "", $texto);
        $texto = str_replace("°", "", $texto);
        $texto = str_replace("\\", "", $texto);
        $texto = str_replace("|", "", $texto);
        $texto = str_replace(",", "", $texto);
        $texto = str_replace(".", "", $texto);
        $texto = str_replace(";", "", $texto);
        $texto = str_replace(":", "", $texto);
        $texto = str_replace(">", "", $texto);
        $texto = str_replace("<", "", $texto);
        $texto = str_replace("/", "", $texto);
        $texto = str_replace("*", "", $texto);
        $texto = str_replace("-", "", $texto);
        $texto = str_replace("+", "", $texto);

        return $texto;
    }

    /** Limita o número de caracteres de uma string sem deixar
     * palavras cortadas */
    public static function limitarCaracteres($string, $length = 150)
    {
        if (strlen($string) <= $length)
            return $string;
        $corta = substr($string, 0, $length);
        $espaco = strrpos($corta, ' ');
        return substr($string, 0, $espaco);
    }

    /** Limita o número de caracteres de uma string sem deixar
     * palavras cortadas */
    public static function data_ptBR(string $data)
    {
        $data = str_replace("January", "de Janeiro de", $data);
        $data = str_replace("February", "de Fevereiro de", $data);
        $data = str_replace("March", "de Março de", $data);
        $data = str_replace("April", "de Abril de", $data);
        $data = str_replace("May", "de Maio de", $data);
        $data = str_replace("June", "de Junho de", $data);
        $data = str_replace("July", "de Julho de", $data);
        $data = str_replace("August", "de Agosto de", $data);
        $data = str_replace("September", "de Setembro de", $data);
        $data = str_replace("October", "de Outubro de", $data);
        $data = str_replace("November", "de Novembro de", $data);
        $data = str_replace("December", "de Dezembro de", $data);
        $data = str_replace("Sunday", "Domingo", $data);
        $data = str_replace("Monday", "Segunda-feira", $data);
        $data = str_replace("Tuesday", "Terça-feira", $data);
        $data = str_replace("Wednesday", "Quarta-feira", $data);
        $data = str_replace("Thursday", "Quinta-feira", $data);
        $data = str_replace("Friday", "Sexta-feira", $data);
        $data = str_replace("Saturday", "Sábado", $data);


        return $data;
    }

    /**
     * Extrai somente o texto de formatações com separações tipo '#@#'
     */
    public static function extrairTexto($texto, $ini = '<p>', $fim = '</p>')
    {

        $conpos = explode('#@#', $texto);

        $con = '';

        foreach ($conpos as $valor) {

            if ($valor != '') {

                $c = explode('=', $valor);

                if ($c [0] == 'texto') {

                    $con .= $ini . $c [1] . $fim;
                }
            }
        }

        return $con;
    }

    public static function mask($val, $mask)
    {
        $maskared = '';
        $k = 0;
        for ($i = 0; $i <= strlen($mask) - 1; $i++) {
            if ($mask[$i] == '#') {
                if (isset($val[$k]))
                    $maskared .= $val[$k++];
            } else {
                if (isset($mask[$i]))
                    $maskared .= $mask[$i];
            }
        }
        return $maskared;
    }

    public static function extractCommonWords($string)
    {
        $stopWords = array('i', 'a', 'about', 'an', 'and', 'are', 'as', 'at', 'be', 'by', 'com', 'de', 'en', 'for', 'from', 'how', 'in', 'is', 'it', 'la', 'of', 'on', 'or', 'that', 'the', 'this', 'to', 'was', 'what', 'when', 'where', 'who', 'will', 'with', 'und', 'the', 'www');

        $string = preg_replace('/\s\s+/i', '', $string); // replace whitespace
        $string = trim($string); // trim the string
        $string = preg_replace('/[^a-zA-Z0-9 -]/', '', $string); // only take alphanumerical characters, but keep the spaces and dashes too…
        $string = strtolower($string); // make it lowercase

        preg_match_all('/\b.*?\b/i', $string, $matchWords);
        $matchWords = $matchWords[0];

        foreach ($matchWords as $key => $item) {
            if ($item == '' || in_array(strtolower($item), $stopWords) || strlen($item) <= 3) {
                unset($matchWords[$key]);
            }
        }
        $wordCountArr = array();
        if (is_array($matchWords)) {
            foreach ($matchWords as $key => $val) {
                $val = strtolower($val);
                if (isset($wordCountArr[$val])) {
                    $wordCountArr[$val]++;
                } else {
                    $wordCountArr[$val] = 1;
                }
            }
        }
        arsort($wordCountArr);
        $wordCountArr = array_slice($wordCountArr, 0, 10);
        return $wordCountArr;
    }

    public function gerar_senha($tamanho, $maiusculas = true, $minusculas = true, $numeros = true, $simbolos = true)
    {
        $ma = "ABCDEFGHIJKLMNOPQRSTUVYXWZ"; // $ma contem as letras maiúsculas
        $mi = "abcdefghijklmnopqrstuvyxwz"; // $mi contem as letras minusculas
        $nu = "0123456789"; // $nu contem os números
        $si = "!@#$%&*()_+="; // $si contem os símbolos
        $senha = '';

        if ($maiusculas) {
            // se $maiusculas for "true", a variável $ma é embaralhada e adicionada para a variável $senha
            $senha .= str_shuffle($ma);
        }

        if ($minusculas) {
            // se $minusculas for "true", a variável $mi é embaralhada e adicionada para a variável $senha
            $senha .= str_shuffle($mi);
        }

        if ($numeros) {
            // se $numeros for "true", a variável $nu é embaralhada e adicionada para a variável $senha
            $senha .= str_shuffle($nu);
        }

        if ($simbolos) {
            // se $simbolos for "true", a variável $si é embaralhada e adicionada para a variável $senha
            $senha .= str_shuffle($si);
        }

        // retorna a senha embaralhada com "str_shuffle" com o tamanho definido pela variável $tamanho
        return substr(str_shuffle($senha), 0, $tamanho);
    }

    public static function soNumeros($txt)
    {
        return preg_replace("/[^0-9]/", "", $txt);
    }

    public static function formatPhone($phone)
    {
        $formatedPhone = preg_replace('/[^0-9]/', '', $phone);
        $matches = [];
        preg_match('/^([0-9]{2})([0-9]{4,5})([0-9]{4})$/', $formatedPhone, $matches);
        if ($matches) {
            return '(' . $matches[1] . ') ' . $matches[2] . '-' . $matches[3];
        }

        return $phone;
    }

    public static function validaCPF($cpf)
    {

        // Extrai somente os números
        $cpf = preg_replace('/[^0-9]/is', '', $cpf);

        // Verifica se foi informado todos os digitos corretamente
        if (strlen($cpf) != 11) {
            return false;
        }

        //cpf padrão da defesa civil
        if ($cpf == 00000000000) {
            return true;
        }

        // Verifica se foi informada uma sequência de digitos repetidos. Ex: 111.111.111-11
        if (preg_match('/(\d)\1{10}/', $cpf)) {
            return false;
        }

        // Faz o calculo para validar o CPF
        for ($t = 9; $t < 11; $t++) {
            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $cpf[$c] * (($t + 1) - $c);
            }
            $d = ((10 * $d) % 11) % 10;
            if ($cpf[$c] != $d) {
                return false;
            }
        }

        return true;
    }

    public static function validaCNPJ($cnpj)
    {
        $cnpj = preg_replace('/[^0-9]/', '', (string)$cnpj);

        // Valida tamanho
        if (strlen($cnpj) != 14)
            return false;

        // Verifica se todos os digitos são iguais
        if (preg_match('/(\d)\1{13}/', $cnpj))
            return false;

        // Valida primeiro dígito verificador
        for ($i = 0, $j = 5, $soma = 0; $i < 12; $i++) {
            $soma += $cnpj[$i] * $j;
            $j = ($j == 2) ? 9 : $j - 1;
        }

        $resto = $soma % 11;

        if ($cnpj[12] != ($resto < 2 ? 0 : 11 - $resto))
            return false;

        // Valida segundo dígito verificador
        for ($i = 0, $j = 6, $soma = 0; $i < 13; $i++) {
            $soma += $cnpj[$i] * $j;
            $j = ($j == 2) ? 9 : $j - 1;
        }

        $resto = $soma % 11;

        return $cnpj[13] == ($resto < 2 ? 0 : 11 - $resto);
    }

    public static function getIconArquivo($filename)
    {
        $icon = 'fa-folder';
        $ext = explode('.', $filename);
        $ext = end($ext);

        if (in_array($ext, ['jpg', 'png', 'jpeg', 'gif', 'webp', 'jfif', 'pjpeg', 'svg'])) {
            $icon = 'fa-file-image';
        }
        if (in_array($ext, ['avi', 'mp4', 'mov', 'wmv', 'avchd', 'flv', 'f4v', 'webm'])) {
            $icon = 'fa-file-video';
        }
        if (in_array($ext, ['pdf', 'doc', 'docx', 'odt', 'ppt'])) {
            $icon = 'fa-file-pdf';
        }

        return $icon;
    }


    public static function filterNomeArquivo($nome)
    {
        $qtds = explode('.', $nome);
        $nomeFinal = '';
        foreach ($qtds as $und) {
            if ($und != end($qtds)) {
                $nomeFinal .= $und;
            } else {
                $nomeFinal = mb_strimwidth(str_replace('-', '', Texto::slug(($nomeFinal ?? 'arquivo'), '.')), 0, 50);
                $nomeFinal .= ".$und";
            }
        }

        return $nomeFinal;
    }

    /**
     * Se possui caracteres ilegais retorna true
     */
    public static function verificaCaracteresIlegais($string): bool
    {
        if (strpos($string, '__')) {
            return true;
        }
        if (strlen($string) < 4) {
            return true;
        }
        $string = str_replace('_', '', $string);
        return !ctype_alnum($string);
    }

}
