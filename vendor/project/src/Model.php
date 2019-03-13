<?php

/* A classe model cria atributos dinamicamente,
    isso significa que os atributos dos objetossão criados com
    a tabela do banco de dados. Além disso a classe model cria os métodos
    acessores getters e setters dinamicamente

*/

namespace Project;

class Model {

    private $values = [];

    public function __call($name, $args)
    {

        // Captura as três primeiras letras do método chamado
        // que serão "get" ou "set", depois pega o resto da string
        // depois cria o getter e o setter do atributo

        $method = substr($name, 0, 3);
        $fieldName = substr($name, 3, strlen($name));

        switch ($method)
        {

            //Cria getters e setters dinamicamente

            case "get":
                return (isset($this->values[$fieldName])) ? $this->values[$fieldName] :NULL;
            break;

            case "set":
                $this->values[$fieldName] = $args[0];
            break;

        }

    }

    public function setData($data = array())
    {

        foreach ($data as $key => $value) {

            $this->{"set" . $key}($value);

        }

    }

    public function getValues()
    {

        return $this->values;

    }

}