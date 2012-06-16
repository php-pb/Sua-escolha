-- phpMyAdmin SQL Dump
-- version 2.9.2
-- http://www.phpmyadmin.net
-- 
-- Servidor: localhost
-- Tempo de Geração: Abr 27, 2012 as 06:21 AM
-- Versão do Servidor: 5.0.27
-- Versão do PHP: 5.2.1
-- 
-- Banco de Dados: `blog`
-- 

-- 
-- Extraindo dados da tabela `comentario`
-- 

INSERT INTO `comentario` (`id`, `postagem_id`, `nome`, `descricao`, `criacao`) VALUES 
(1, 1, 'Fulano de Tal', 'Muito legal! Vai ser muito útil.', '2012-04-25 16:11:33'),
(2, 1, 'Sicrano das Quantas', 'Obrigado cara! Vou usar agora mesmo!', '2012-04-25 16:11:33'),
(5, 3, 'Jaime', 'Teste de comentário', '2012-04-25 17:48:06');

-- 
-- Extraindo dados da tabela `postagem`
-- 

INSERT INTO `postagem` (`id`, `nome`, `descricao`, `criacao`, `usuario_id`) VALUES 
(1, 'Filtro de transliteração para o ZF', 'Já por várias vezes trabalhando em sites, tive a necessidade de  converter strings para um formato sem acentos, cedilha, espaços,  caracteres especiais, ou letras maiúsculas. Seja pra renomear um  arquivo, renomear o título de uma notícia para a url ou criar um <em>alias</em> para um nome de usuário, a idéia é sempre a mesma, ou no mínimo muito semelhante. Isso é chamado <a href="http://pt.wikipedia.org/wiki/Translitera%C3%A7%C3%A3o">transliteração</a>, ou mais comumente, em inglês <em>transliteration</em>.\r\n\r\nProcurando  na internet achei várias expressões regulares que fazem o trabalho, mas  nenhuma dela tinha tudo que eu queria, então resolvi fazer uma classe  seguindo o modelo de classes do Zend Framework, e acabei fazendo duas:  uma de filtro, e um <em>view helper</em>, que usa o filtro.\r\n<pre lang="PHP">class My_Filter_Transliterate implements Zend_Filter_Interface \r\n{\r\n  public function filter($string)\r\n  {\r\n     // Lista de caracteres que devem ser substituídos\r\n     $a = ''ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞ$ßàáâãäåæ@çèéêë&amp;''\r\n        . ''ìíîïðñòóôõöøùúûüýýþÿŔŕ°ºª,.;:\\|/"^~*%# ()[]{}=!?`‘’'' \r\n        . "''";\r\n\r\n     // Lista que irá substituir os caracteres acima\r\n     $b = ''aaaaaaaceeeeiiiidnoooooouuuuybssaaaaaaaaceeeee''\r\n        . ''iiiidnoooooouuuuyybyRrooa--------------------------'' \r\n        . ''-'';\r\n\r\n     // Efetua a substituição\r\n     $string = strtr($string, $a, $b); \r\n\r\n     // Deixa tudo minúsculo\r\n     $string = strtolower($string);\r\n\r\n     // Evita hífens repetidos\r\n     $string = preg_replace(''/--+/'', ''-'', $string); \r\n     return $string;\r\n  }\r\n}</pre>\r\nPronto, tá feito o filtro. Agora pra usar em qualquer lugar, é só instanciar o filtro e chamar o método <code>filter()</code>. Como no exemplo:\r\n<pre lang="PHP">$filterTransliterate = new My_Filter_Transliterate();\r\n$string = ''Já não era sem tempo de Jaime lançar um post novo ''\r\n        . ''nesse blog!!!'';\r\necho $filterTransliterate->filter($string);\r\n// ja-nao-era-sem-tempo-de-jaime-lancar-um-post-novo-nesse-blog</pre>\r\nAgora, só pra facilitar ainda mais, vamos criar um <em>view helper</em> pra usarmos nos nossos <em>scripts</em>.\r\n<pre lang="PHP">class My_View_Helper_Transliterate \r\n    extends Zend_View_Helper_Abstract\r\n{\r\n  public function transliterate($value)\r\n  {\r\n      $filterTransliterate = new My_Filter_Transliterate();\r\n      return = $filterAlias->filter($value);\r\n  }\r\n}</pre>\r\nSimples assim... Agora, dentro dos arquivos de layout ou view, é só chamar como no exemplo abaixo:\r\n<pre lang="PHP">&lt;?php echo transliterate($this->post->title) ?&gt;</pre>', '2011-06-20 23:52:38', 1),
(2, 'Cálculo de tempo decorrido com ZF', 'Não é muito raro vermos em alguns sites, principalmente no rodapé, a  informação do tempo decorrido para exibir uma página. E nos sites em  PHP, geralmente é usado a função <code>microtime</code> para calcular esse tempo, chamando-a antes e depois do trecho de código que queremos calcular o tempo de execução, e depois subtraindo o primeiro do último.\r\n\r\nIsso  é muito útil, principalmente para trabalharmos na melhora da  performance do código. Foi daí que me deu a idéia de criar um plugin  para Zend Framework para facilitar o uso dessa função, e eis o  resultado:\r\n<pre lang="PHP">class My_Controller_Plugin_ElapsedTime\r\n    extends Zend_Controller_Plugin_Abstract\r\n{\r\n  /*\r\n   * Constantes que serão usadas para identificar a partir de\r\n   * que parte da execução deseja-se calcular o tempo decorrido.\r\n   * O nome das constantes é baseado no nome das funções que\r\n   * inicializam os valores correspondentes na propriedade\r\n   * $_startTime, logo abaixo\r\n   */\r\n  const EVENT_ROUTE_STARTUP = 1;\r\n  const EVENT_ROUTE_SHUTDOWN = 2;\r\n  const EVENT_DISPATCH_LOOP_STARTUP = 3;\r\n  const EVENT_PRE_DISPATCH = 4;\r\n  const EVENT_POST_DISPATCH = 5;\r\n  const EVENT_DISPATCH_LOOP_SHUTDOWN = 6;\r\n\r\n  // Guarda o tempo de inicialização de cada parte da execução\r\n  static protected $_startTime = array(\r\n    self::EVENT_ROUTE_STARTUP => null,\r\n    self::EVENT_ROUTE_SHUTDOWN => null,\r\n    self::EVENT_DISPATCH_LOOP_STARTUP => null,\r\n    self::EVENT_PRE_DISPATCH => null,\r\n    self::EVENT_POST_DISPATCH => null,\r\n    self::EVENT_DISPATCH_LOOP_SHUTDOWN => null\r\n  );\r\n\r\n  // Define o tempo de inicialização antes de as rotas serem\r\n  // inicializadas\r\n  public function routeStartup(\r\n     Zend_Controller_Request_Abstract $request)\r\n  {\r\n    self::$_startTime[self::EVENT_ROUTE_STARTUP] =\r\n        $this->microtime();\r\n  }\r\n\r\n  // Define o tempo de inicialização depois de as rotas serem\r\n  // inicializadas\r\n  public function routeShutdown(\r\n     Zend_Controller_Request_Abstract $request)\r\n  {\r\n    self::$_startTime[self::EVENT_ROUTE_SHUTDOWN] =\r\n        $this->microtime();\r\n  }\r\n\r\n  // Define o tempo de inicialização antes de iniciar o loop\r\n  // de dispatch\r\n  public function dispatchLoopStartup(\r\n      Zend_Controller_Request_Abstract $request)\r\n  {\r\n    self::$_startTime[self::EVENT_DISPATCH_LOOP_STARTUP] =\r\n        $this->microtime();\r\n  }\r\n\r\n  // Define o tempo de inicialização antes do dispatch de\r\n  // uma action\r\n  public function preDispatch(\r\n      Zend_Controller_Request_Abstract $request)\r\n  {\r\n    self::$_startTime[self::EVENT_PRE_DISPATCH] =\r\n        $this->microtime();\r\n  }\r\n\r\n  // Define o tempo de inicialização depois do dispatch de\r\n  // uma action\r\n  public function postDispatch(\r\n      Zend_Controller_Request_Abstract $request)\r\n  {\r\n    self::$_startTime[self::EVENT_POST_DISPATCH] =\r\n        $this->microtime();\r\n  }\r\n\r\n  // Define o tempo de inicialização depois de finalizar o\r\n  // loop de dispatch\r\n  public function dispatchLoopShutdown()\r\n  {\r\n    self::$_startTime[self::EVENT_DISPATCH_LOOP_SHUTDOWN] =\r\n        $this->microtime();\r\n  }\r\n\r\n  /**\r\n   * Retorna o tempo de inicialização de cada evento do plugin,\r\n   * ou de um evento específico, que pode ser passado como\r\n   * parâmetro baseado no valor das contantes desta classe\r\n   *\r\n   * @param int $event\r\n   * @return mixed Float se receber $event, senão, array\r\n   */\r\n  public function getStartTime($event=null)\r\n  {\r\n    if ($event) {\r\n      if (!isset(self::$_startTime[$event])) {\r\n        throw new Zend_Exception(''Invalid value for $event: ''\r\n           . $event);\r\n      }\r\n      return self::$_startTime[$event];\r\n    }\r\n    return self::$_startTime;\r\n  }\r\n\r\n  /**\r\n   * Calcula o tempo decorrido de um trecho e código.\r\n   *\r\n   * @param int $event\r\n   * @return float\r\n   */\r\n  public function getElapsedTime(\r\n     $event=self::EVENT_ROUTE_STARTUP)\r\n  {\r\n    $startTime = $this->getStartTime($event);\r\n\r\n    // Lança uma excessão Caso o evento não tenha sido\r\n    // inicializado ainda\r\n    if (!$startTime) {\r\n      throw new Zend_Exception(''Event has not been ''\r\n        . ''initialized yet'');\r\n    }\r\n\r\n    // Pega o microtime atual e substrai dele o tempo\r\n    // inicial para calcular o tempo decorrido\r\n    $endTime = $this->microtime();\r\n    $elapsedTime = $endTime - $startTime;\r\n\r\n    return $elapsedTime;\r\n  }\r\n\r\n  /**\r\n   * Pega o microtime em formato float, levando em conta as\r\n   * variações sofridas pela função de acordo com a versão do\r\n   * PHP\r\n   */\r\n  private function _microtime()\r\n  {\r\n    if (version_compare(PHP_VERSION, ''5.0.0'', ''>='')) {\r\n      // O parâmetro já converte o restulado da função para\r\n      // float a partir da versão 5.0.0\r\n      return microtime(true);\r\n    } else {\r\n      // Antes da versão 5.0.0, a conversão para float tinha\r\n      // que ser feita manualmente\r\n      list($usec, $sec) = explode(" ", microtime());\r\n      return ((float)$usec + (float)$sec);\r\n    }\r\n  }\r\n}</pre>\r\nUfa,  parece coisa demais pra uma coisa tão simples, não é? Mas tudo isso nos  dá a possibilidade de medir o tempo de execução a partir de várias  partes diferentes do código, que é uma facilidade que os plugins do ZF  nos oferece, então, por que não aproveitar isso pra fazer um plugin mais  completo, não é?\r\n\r\nFeito o plugin, agora vamos ao View Helper, que vai se encarregar de pegar o valor definido no plugin e subtraí-lo de um novo <code>microtime</code> para exibir na página:\r\n<pre lang="PHP">class My_View_Helper_ElapsedTime\r\n     extends Zend_View_Helper_Abstract\r\n{\r\n  /**\r\n   * Exibe o tempo decorrido de um trecho de código\r\n   * baseado nos valores inicializados no plugin\r\n   * ''My_Controller_Plugin_ElapsedTime''\r\n   *\r\n   * @param int $precision\r\n   * @param string|Zend_Locale $locale\r\n   * @return float\r\n   * @throws Zend_Exception\r\n   */\r\n  public function elapsedTime($precision = null,\r\n      $locale = null, $event =\r\n      My_Controller_Plugin_ElapsedTime::EVENT_ROUTE_STARTUP)\r\n  {\r\n    $pluginClass = ''My_Controller_Plugin_ElapsedTime'';\r\n\r\n    // Verifica se o plugin foi registrado\r\n    if (!Zend_Controller_Front::getInstance()\r\n            ->hasPlugin($pluginClass)) {\r\n      throw new Exception("Plugin ''{$_pluginClass}'' is not ''\r\n          . ''registered");\r\n    }\r\n\r\n    // Primeiro vamos pegar o plugin lá do front controller,\r\n    // que já foi inicializado\r\n    $elapsedTimePlugin = Zend_Controller_Front::getInstance()\r\n         ->getPlugin($pluginClass);\r\n\r\n    // Agora vamos pegar o valor calculado do tempo decorrido,\r\n    // passando como parâmetro uma daquelas constantes definidas\r\n    // na classe do plugin, pra dizer a partir de que ponto do\r\n    // código onde calcular o tempo de execução. O padrão é de\r\n    // antes da inicialização das rotas.\r\n    $elapsedTime = $elapsedTimePlugin->getElapsedTime($event);\r\n\r\n    // Retorna o tempo decorrido formatado, levando em conta o\r\n    // número de decimais a ser exibido e a localização, para\r\n    // apresentar os símbolos de separação de milhares e de\r\n    // decimais corretos\r\n    return Zend_Locale_Format::toFloat($elapsedTime, array(\r\n      ''precision'' => $precision, ''locale'' => $locale));\r\n    }\r\n\r\n}</pre>\r\nAgora  é só chamar o view helper lá no script pra exibir o tempo? Não, ainda  falta uma coisa. É preciso inicializar o plugin primeiro. Basta colocar  lá no <code>application.ini</code> uma linhazinha de código, que ele será inicializado automaticamente:\r\n\r\n<pre lang="PHP">resources.frontController.plugins[] = My_Controller_Plugin_ElapsedTime</pre>\r\n\r\nAgora sim, vamos ao script <code>phtml</code> chamar nosso view helper e ver ele funcionando:\r\n<pre lang="PHP">Essa página foi carregada em &lt;?php echo $this->elapsedTime(2) ?&gt; segundos</pre>\r\nAgora vamos experimentar alterar os parâmetros pra ver os tempo decorrido a partir de diferentes trechos do código:\r\n<pre lang="PHP"><ul>&lt;?php\r\n$events = array(\r\n  1 => ''routeStartup'',\r\n  2 => ''routeShutdown'',\r\n  3 => ''dispatchLoopStartup'',\r\n  4 => ''preDispatch'',\r\n  5 => ''postDispatch'',\r\n//  6 => ''dispatchLoopShutdown''\r\n);\r\nforeach($events as $eventId => $eventName) {\r\n  echo ''<li>'' . $eventName . '': ''\r\n     . $this->elapsedTime(2, ''pt_BR'', $eventId)\r\n     . '' segundos</li>'';\r\n}\r\n?&gt;</ul></pre>\r\nO  último tipo de evento (dispatchLoopShutdown) ficou comentado por uma  boa razão. Quando a view é executada, esse ponto do código ainda não foi  alcançado, portanto será lançada uma excessão, como foi definido na  classe do plugin. Esse caso é usado mais para fins de debug mesmo, e  para ver o resultado desse cálculo, é preciso chamar o plugin  diretamente do front controller. Um exemplo, é chamá-lo no index.php no  fim do arquivo:\r\n<pre lang="PHP">$application->bootstrap()->run();\r\necho Zend_Controller_Front::getInstance()\r\n    ->getPlugin(''Case_Controller_Plugin_ElapsedTime'')\r\n    ->getElapsedTime(\r\n            Case_Controller_Plugin_ElapsedTime::EVENT_DISPATCH_LOOP_SHUTDOWN\r\n    );</pre>\r\nProntinho. Façam bom proveito!', '2011-06-24 10:40:00', 1),
(3, 'Iniciando o WAMP junto com o Windows', 'Se você trabalha com WAMP, sabe como é chato toda vez que iniciar o Windows ter que iniciá-lo para que possa usar o Apache e o Mysql. Então, vai uma dica rápida para iniciar esses serviços junto com o Windows, que não é apenas copiar o link de inicialização do WAMP para a pasta "Inicializar" (que nem sempre funciona, ou fica exibindo aquela tela de permissão).\r\n\r\nEis o passo a passo:\r\n<ol>\r\n	<li>No Windows 7, clique em Iniciar e, na barra de pesquisa por programas e arquivos, digite: <strong>services.msc\r\n</strong></li>\r\n	<li>Clique no arquivo que vai aparecer, ou simplesmente aperte o ENTER.</li>\r\n	<li>Na janela que se abre, procure os serviços de nome: <strong>wampapache</strong> e <strong>wampmysqld</strong></li>\r\n	<li>Perceba que na coluna "Tipo de Inicialização", eles estão como "Manual"</li>\r\n	<li>Clique com botão direito em um deles, e selecione "Propriedades"</li>\r\n	<li>Mude "Tipo de Inicialização" para "Automático" e clique "OK"</li>\r\n	<li>Faça o mesmo para o outro serviço.</li>\r\n</ol>\r\nProntinho... quando você reiniciar o Windows os serviços já estarão inicializados. Perceba, no entanto, que o que estará sendo iniciado automaticamente são os serviços Apache e Mysql, e não o Wamp em si. Ou seja, o iconezinho dele não vai estar lá do lado do relógio. Mas você vai poder usar os serviços normalmente, e só se realmente precisar mexer no WAMP é que vai ter que iniciá-lo.\r\n\r\nRepare que essa dica serve pra o caso de você querer inicializar automaticamente qualquer desses outros serviços da lista. Prático, não? ^__^', '2012-03-20 15:02:00', 1);

-- 
-- Extraindo dados da tabela `usuario`
-- 

INSERT INTO `usuario` (`id`, `nome`, `senha`, `email`, `perfil`) VALUES 
(1, 'Jaime Neto', '202cb962ac59075b964b07152d234b70', 'contato@jaimeneto.com', 'admin');
