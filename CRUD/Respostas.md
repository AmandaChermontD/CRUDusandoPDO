1. No contexto da programação orientada a objetos, explique o que é uma "interface". Como o que aparece no código do artigo:

Uma interface em programação orientada a objetos é uma especificação de métodos que uma classe deve implementar, sem especificar como esses métodos devem ser implementados. É útil para permitir que diferentes classes implementem o mesmo conjunto de métodos e garantir um comportamento consistente em todo o sistema. No exemplo de código apresentado, a classe DaoContato implementa a interface iDaoModeCrud e deve implementar os quatro métodos definidos na interface: create(), read(), update() e delete().

2. O que são "traits" no PHP?

Em PHP, um trait é uma forma de reutilizar código em várias classes sem usar herança múltipla. Ele permite compartilhar comportamentos entre classes, adicionando métodos e propriedades a uma classe que incorpora o trait usando a palavra-chave "use". Isso pode ser útil para evitar a criação de hierarquias de classes complicadas ou duplicação de código. No entanto, o uso excessivo de traits pode tornar o código difícil de entender e manter.

3. No código aparece o método "bindValue" do PDO para definir o valor que será utilizado na execução da instrução SQL. No PDO, também existe o método "bindParam". Qual(is) a(s) diferença(s) entre eles?

Os métodos "bindValue" e "bindParam" do PDO são usados para definir valores que serão utilizados na execução de instruções SQL. No entanto, a principal diferença entre eles é que o "bindValue" atribui diretamente um valor a um parâmetro, enquanto o "bindParam" vincula um parâmetro a uma variável.

4. No código é utilizada função "__autoload()" que foi descontinuada ("deprecated") no PHP desde a versão 7.2.0 e foi removida no PHP 8.0.0. Reescreva o código para efetuar o autoload de classes na versão atual do PHP.
interface iDaoModeCrud {
public function create( $object );
public function read( $param );
public function update( $object );
public function delete( $param );
}
spl_autoload_register(function ($class_name) {
include $class_name . '.php';
}
class DaoContato implements iDaoModeCrud {
}
5. e 6. Estão no código.