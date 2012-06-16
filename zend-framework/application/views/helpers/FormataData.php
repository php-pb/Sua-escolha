<?php

/**
 * Formatação de data
 *
 * @author Jaime Neto
 */
class Application_View_Helper_FormataData extends Zend_View_Helper_Abstract
{
    /**
     * Formato padrão da datas no banco de dados
     * 
     * @var string
     */
    const FORMATO_DO_BANCO = 'yyyy-MM-dd HH:mm:ss';

    /**
     *
     * @param string $formatoSaida O formato que a data será retornada
     * @param string $umaData Uma data válida
     * @param string $formatoEntrada O formato em que a data será inserida
     * @return string Data formatada
     */
    function formataData($formatoSaida = 'dd/MM/yyyy', $umaData=null, $formatoEntrada=self::FORMATO_DO_BANCO)
    {
        $data = $umaData && Zend_Date::isDate($umaData, $formatoEntrada)
            ? new Zend_Date($umaData, $formatoEntrada, 'pt_BR')
            : Zend_Date::now();

        return $data->toString($formatoSaida);
    }
}
