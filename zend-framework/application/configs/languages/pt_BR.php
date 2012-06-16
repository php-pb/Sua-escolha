<?php

return array(
        'Test' => 'Testar',
        'Save' => 'Salvar',
        'Apply' => 'Aplicar',
        'Reset' => 'Desfazer',
        'Cancel' => 'Cancelar',
    
        'isEmpty' => 'Este campo não pode ser vazio',
        'stringEmpty' => "'%value%' é uma string vazia",

        // Email
        'emailAddressInvalid' => 'Não é um endereço e-mail válido',
        'emailAddressInvalidFormat' => "Não é um endereço de e-mail válido",

        //hostname
        'hostnameIpAddressNotAllowed' => "'%value%' Parece ser um endereço de IP, mas endereços de IP não são permitidos",
        'hostnameUnknownTld' => "'%value%' parece ser um DNS, mas não foi possivel validar o TLD",
        'hostnameDashCharacter' => "'%value%' parece ser um DNS, mas contém um 'hífen' (-) em uma posição inválida",
        'hostnameInvalidHostnameSchema' => "'%value%' parece ser um DNS, mas não foi poss[evel comparar com o schema para o TLD '%tld%'",
        'hostnameUndecipherableTld' => "'%value%' parece ser um DNS mas não foi possível extrair o TLD",
        'hostnameInvalidHostname' => "'%value% não é compatível com a estrutura DNS",
        'hostnameInvalidLocalName' => "'%value%' não parece ser uma rede local válida",
        'hostnameLocalNameNotAllowed' => "'%value%' parece ser o nome de uma rede local, mas nome de rede local não são permitido",

        //identical
        'notSame' => "Comparação não bate",
        'missingToken' => "Não foi fornecido parâmetros para teste",

        //greater then
        'notGreaterThan' => "'%value%' não é maior que '%min%'",

        //float
        'notFloat' => "Valor inválido", //"'%value%' não é do tipo float",

        //date
        'dateNotYYYY-MM-DD' => "'%value%' deve estar no formato aaaa-mm-dd",
        'dateInvalid' => "'%value%' não parece ser um data válida",
        'dateFalseFormat' => "'%value%' não combina com o formato informado",

        //digits
        'notDigits' => "'%value%' não contém apenas dígitos",

        //between
        'notBetween' => "'%value%' não está entre '%min%' e '%max%', inclusive",
        'notBetweenStrict' => "'%value%' não está estritamente entre '%min%' e '%max%'",

        //alnum
        'notAlnum' => "'%value%' não possui apenas letras e dígitos",

        //alpha
        'notAlpha' => "'%value%' não possui apenas letras",

        //in array
        'notInArray' => "'%value%' não foi encontrado na lista",

        //int
        'notInt' => "'%value%' não parece ser um inteiro",

        //ip
        'notIpAddress' => "'%value%' não parece ser um endereço ip válido",

        //lessthan
        'notLessThan' => "'%value%' não é menor que '%max%'",

        //notempty
        'isEmpty' => "Este campo não pode ser vazio",

        //regex
        'regexNotMatch' => "'%value%' não foi validado na expressão '%pattern%'",

        //stringlength
        'stringLengthTooShort' => "Este campo não deve ter menos que %min% caracteres",
        'stringLengthTooLong' => "Este campo só pode ter até %max% caracteres",

        //file_upload
        'fileUploadErrorIniSize' => "O arquivo é maior que o tamanho máximo permitido",
//        'fileUploadErrorFormSize' => "File '%value%' exceeds the defined form size",
//        'fileUploadErrorPartial' => "File '%value%' was only partially uploaded",
        'fileUploadErrorNoFile' => "O arquivo não foi enviado corretamente",
//        'fileUploadErrorNoTmpDir' => "No temporary directory was found for file '%value%'",
//        'fileUploadErrorCantWrite' => "File '%value%' can't be written",
//        'fileUploadErrorExtension' => "A PHP extension returned an error while uploading the file '%value%'",
//        'fileUploadErrorAttack' => "File '%value%' was illegally uploaded. This could be a possible attack",
//        'fileUploadErrorFileNotFound' => "File '%value%' was not found",
        'fileUploadErrorUnknown' => "Erro desconhecido ao tentar enviar o arquivo",

        //db
        'recordFound' => "'%value%' não está disponível",
        'noRecordFound' => "Nenhum registro com valor '%value%' foi encontrado",

        //link
        'linkInvalid' => "'%value%' não é uma URL válida",

        //time
        'timeInvalid' => "'%value%' não é válido",

        //username
        'usernameInvalid' => "'%value%' não é um nome de usuário válido. Use apenas letras, números ou \"_\"."

//      '' => "",

);