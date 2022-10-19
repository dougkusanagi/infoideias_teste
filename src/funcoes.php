<?php

namespace SRC;

class Funcoes
{

    private array $array_simples;

    /*

    Desenvolva uma função que receba como parâmetro o ano e retorne o século ao qual este ano faz parte. O primeiro século começa no ano 1 e termina no ano 100, o segundo século começa no ano 101 e termina no 200.

	Exemplos para teste:

	Ano 1905 = século 20
	Ano 1700 = século 17

     * */
    public function SeculoAno(int $ano): int
    {
        if ($ano < 0) {
            throw new \Exception('O parâmetro $ano deve ser positivo');
        }

        if ($ano <= 100) return 1;

        return $ano % 100 === 0 ? $ano / 100 : ($ano / 100) + 1;
    }









    /*

    Desenvolva uma função que receba como parâmetro um número inteiro e retorne o numero primo imediatamente anterior ao número recebido

    Exemplo para teste:

    Numero = 10 resposta = 7
    Número = 29 resposta = 23

     * */
    public function PrimoAnterior(int $numero): int
    {
        if ($numero <= 2) {
            throw new \Exception('O parâmetro $numero deve ser maior que 1');
        }

        for ($i = $numero - 1; $i >= 2; $i--) {
            if ($this->ePrimo($i)) return $i;
        }
    }

    // Verifica se o número dado é primo
    public function ePrimo($numero)
    {
        for ($i = 2; $i < $numero - 1; $i++) {
            if ($numero % $i === 0) return false;
        }

        return true;
    }








    /*

    Desenvolva uma função que receba como parâmetro um array multidimensional de números inteiros e retorne como resposta o segundo maior número.

    Exemplo para teste:

	Array multidimensional = array (
	array(25,22,18),
	array(10,15,13),
	array(24,5,2),
	array(80,17,15)
	);

	resposta = 25

     * */
    public function SegundoMaior(array $arr): int
    {
        if (!is_array($arr)) {
            throw new \Exception('O parâmetro $arr deve ser um array');
        }

        // Simplifica o array para que esteja em um único nível
        $array_simples = $this->SimplificarArray($arr);
        
        // var_dump($array_simples);
        // Ordena de forma crescente
        sort($array_simples);

        return $array_simples[count($array_simples) - 2];
    }

    private function SimplificarArray(array $array): array
    {
        // Caso $array não seja um array, armazena como elemento da propriedade $this->array_simples
        if (!is_array($array)) {
            $this->array_simples[] = $array;
        
        // Caso $array seja um array, repassa para ser iterado novamente
        // assim, o array pode ter quantos níveis forem necessários
        } else {
            foreach ($array as $value) {
                if (!is_array($value)) {
                    $this->array_simples[] = $value;
                    continue;
                }
                $this->SimplificarArray($value);
            }
        }

        return $this->array_simples;
    }






    /*
   Desenvolva uma função que receba como parâmetro um array de números inteiros e responda com TRUE or FALSE se é possível obter uma sequencia crescente removendo apenas um elemento do array.

	Exemplos para teste 

	Obs.:-  É Importante  realizar todos os testes abaixo para garantir o funcionamento correto.
         -  Sequencias com apenas um elemento são consideradas crescentes

    [1, 3, 2, 1]  false
    [1, 3, 2]  true
    [1, 2, 1, 2]  false
    [3, 6, 5, 8, 10, 20, 15] false
    [1, 1, 2, 3, 4, 4] false
    [1, 4, 10, 4, 2] false
    [10, 1, 2, 3, 4, 5] true
    [1, 1, 1, 2, 3] false
    [0, -2, 5, 6] true
    [1, 2, 3, 4, 5, 3, 5, 6] false
    [40, 50, 60, 10, 20, 30] false
    [1, 1] true
    [1, 2, 5, 3, 5] true
    [1, 2, 5, 5, 5] false
    [10, 1, 2, 3, 4, 5, 6, 1] false
    [1, 2, 3, 4, 3, 6] true
    [1, 2, 3, 4, 99, 5, 6] true
    [123, -17, -5, 1, 2, 3, 12, 43, 45] true
    [3, 5, 67, 98, 3] true

     * */

    public function SequenciaCrescente(array $arr): bool
    {
        if (!is_array($arr)) {
            throw new \Exception("O parâmetro $arr deve ser um array", 1);
        }

        // Remove cada elemento do array e testa se o restante é crescente
        for ($i = 0; $i < count($arr); $i++) {
            $array_check = $arr;
            unset($array_check[$i]);

            if ($this->eCrescente($array_check)) return true;
        }

        return false;
    }

    private function eCrescente(array $array): bool
    {
        // Retorna verdadeiro caso só exista um elemento
        if (count($array) === 1) return true;

        // Reseta os índices do array
        $array = array_values($array);

        // Verifica se cada elemento (exceto o último) é menor que o próximo
        for ($i = 0; $i < count($array) - 1; $i++) {
            if ($array[$i] >= $array[$i + 1]) return false; 
        }

        return true;
    }
}
