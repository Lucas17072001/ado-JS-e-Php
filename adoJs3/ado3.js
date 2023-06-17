"use strict";

// EXERCÍCIO 0 - ANTES DE MAIS NADA, IMPLEMENTE ESTA FUNÇÃO.
/**
 * Função que retorna um Array contendo os nomes dos alunos que fizeram este exercício.
 * @return {string[]} Os nomes dos alunos que fizeram este exercício.
 */
function nomesDosAlunos() {
    return [ "Lucas Noe da Silva", "Matheus Ferrari Damasceno Pereira", "Luan da Silva Ferreira" ];
}

// EXERCÍCIO 1.
/**
 * Receba um valor em graus e converta para radianos.
 * @param {number} graus O valor em graus.
 * @return {number} O valor em radianos.
 * @throws ConvertError Se o valor em graus não for um número finito.
 */
function grausParaRadianos(graus) {
	const pi = 3.141592653589793;

	if (!Number.isFinite(graus) || graus === null || isNaN(graus) || graus === undefined) {
		throw new ConvertError ('Não aceita porcaria');
	}

	const radianos = graus * pi / 180;
	return radianos;
}


// EXERCÍCIO 2.
/**
 * Receba um valor em radianos e converta para graus.
 * @param {number} graus O valor em radianos.
 * @return {number} O valor em graus.
 * @throws ConvertError Se o valor em radianos não for um número finito.
 */
function radianosParaGraus(radianos) {
	const pi = 3.141592653589793;

	if (!Number.isFinite(radianos) || radianos === null || isNaN(radianos) || radianos === undefined) {
		throw new ConvertError ('Não aceita porcaria');
	}
	
	const graus = 180 * radianos / pi;
	return graus
}

// EXERCÍCIO 3.
/**
 * Converta uma temperatura entre 3 possíveis escalas: Celsius, Kelvin e Fahreinheit. As escalas são especificadas pelas strings "C", "F" e "K".
 * Zero graus Celsius é o mesmo que 32 graus Fahreinheit ou 273.15 graus Kelvin.
 * 100 graus Celsius é o mesmo que 212 graus Fahreinheit ou 373.15 graus Kelvin.
 * Os valores resultantes devem ser arredondados em 2 casas decimais. Use a função auxiliar arredondar2Casas para fazer isso.
 * @param {number} valor O valor da temperatura na escala especificada pelo parâmetro "de".
 * @param {string} de A escala da temperatura especificada pelo parâmetro "valor". Pode ser "K" para Kelvin, "C" para Celsius ou "F" para Fahreinheit.
 * @param {string} para A escala da temperatura a ser retornada. Pode ser "K" para Kelvin, "C" para Celsius ou "F" para Fahreinheit.
 * @return {number} O valor da temperatura correspondente.
 * @throw ConvertError Se o valor não for um número finito ou se qualquer uma das escalas for diferente de "C", "F" ou "K".
 */
function converterTemperatura(valor, de, para) {
	if (!Number.isFinite(valor)) {
		throw new ConvertError('Não aceita porcaria');
	}
	if (de === "C") {
		if (para === "K") {
			const Kel = (valor + 273.15).toFixed(2);
			return Number(Kel);
		}
		if (para === "F") {
			const Far = ((valor * 1.8) + 32).toFixed(2);
			return Number(Far);
		}
		if (para === "C"){
			return valor;
		}
		else{
			throw new ConvertError('Não aceita porcaria');
		}
	}

	if (de === "K") {
		if (para === "C") {
			const CelK = (valor - 273.15).toFixed(2);
			return Number(CelK);
		}
		if (para === "F") {
			const FarK = ((valor - 273.15) * 9/5 + 32).toFixed(2);
			return Number(FarK);
		}
		if (para === "K"){
			return valor;
		}
		else{
			throw new ConvertError('Não aceita porcaria');
		}
	}

	if (de === "F") {
		if (para === "K") {
			const KelF = ((valor - 32) * 5/9 + 273.15).toFixed(2);
			return Number(KelF);
		}
		if (para === "C") {
			const Cel = ((valor - 32) / 1.8).toFixed(2);
			return Number(Cel);
		}
		if (para === "F"){
			return valor;
		}
		else{
			throw new ConvertError('Não aceita porcaria');
		}
	}
	else{
		throw new ConvertError('Unidades de temperatura inválidas');
	}
}



// EXERCÍCIO 4.
/**
 * Obtenha o fatorial de um número.
 * @param {number} n O valor do qual se deseja obter o fatorial.
 * @return {bigint} O valor de n! expresso em BigInt.
 * @throw ConvertError Se o parâmetro não for um número inteiro ou for menor que zero.
 */
function fatorial(n) {
    if (!Number.isInteger(n) || n < 0) {
        throw new ConvertError("O parâmetro deve ser um número inteiro não negativo.");
    }
    
    let resultado = 1n;
    
    for (let i = 2; i <= n; i++) {
        resultado *= BigInt(i);
    }
    
    return resultado;
}


// EXERCÍCIO 5.
/**
 * Obtenha o n-ésimo número de Fibonacci.
 *
 * Dica:
 * Cuidado ao implementar essa função! A implementação mais direta pode demorar séculos para fornecer
 * o resultado de um número de Fibonacci grande. Mas uma implementação um pouco mais inteligente que
 * memorize resultados já anteriormente computados trás o mesmo resultado em microssegundos.
 *
 * @param {number} n O valor do qual se deseja obter o número de Fibonacci correspondente.
 * @return {bigint} n O n-ésimo número de Fibonacci expresso em BigInt.
 * @throw ConvertError Se o parâmetro não for um número inteiro ou for menor que zero.
 */
function fibonacci(n) {
	if (!Number.isInteger(n) || n < 0) {
		throw new ConvertError('O parâmetro deve ser um número inteiro não negativo.');
	}

	let a = 0n;
	let b = 1n;

	if (n === 0) {
		return a;
	} else if (n === 1) {
		return b;
	}

	for (let i = 2; i <= n; i++) {
		let temp = a + b;
		a = b;
		b = temp;
	}

	return b;
}

// EXERCÍCIO 6.
/**
 * Obtenha o n-ésimo número triangular.
 *
 * @param {n} n O valor do qual se deseja obter o número triangular correspondente.
 * @return {bigint} n O n-ésimo número triangular expresso em BigInt.
 * @throw ConvertError Se o parâmetro não for um número inteiro ou for menor que zero.
 */
function triangular(n) {
	if (typeof n !== 'bigint' || n < 0n) {
		throw new ConvertError('O parâmetro deve ser um número inteiro não negativo.');
	} else {
		return (n * (n + 1n)) / 2n;
	}
}




// EXERCÍCIO 7.
/**
 * Retorne uma expressão regular que valide um CEP da seguinte forma:
 * Cinco dígitos, talvez um hífen, mais três dígitos.
 * É importante que a expressão regular tenha menos que 25 caracteres de comprimento!
 * @return {RegExp} Uma expressão regular.
 */
function cepRegex() {
     return /^\d{5}-?\d{3}$/;
}

// EXERCÍCIO 8.
/**
 * Retorne uma expressão regular que valide um número de DDD brasileiro.
 * É importante que a expressão regular tenha menos que 60 caracteres de comprimento!
 * @return {RegExp} Uma expressão regular.
 */
function dddRegex() {
  return /^(?:[14689][1-9]|2[12478]|3[1234578]|5[1345]|7[134579])$/g;
}




// EXERCÍCIO 9.
/**
 * Utilizando AJAX ou fetch API, pesquise por um CEP na URL http://viacep.com.br/ws/XXXXX-XXX/json/,
 * onde XXXXX-XXX é o CEP a ser pesquisado.
 * @param {string} cep O CEP a ser pesquisado.
 * @return {Endereco} Uma instância da classe Endereco contendo o logradouro, bairro, localidade (cidade) e UF do CEP pesquisado.
 * @throws ConvertError Se o CEP a ser pesquisado não for uma string ou não tiver o formato correto de um CEP.
 * @throws PesquisaCepError Se o CEP não for encontrado.
 */
async function pesquisarCep(cep) {
	if (typeof cep !== "string" || !/^\d{5}-?\d{3}$/.test(cep)) {
		throw new ConvertError('CEP inválido');
	}

	const url = `http://viacep.com.br/ws/${cep}/json/`;
	const response = await fetch(url);

	if (!response.ok) {
		throw new ConvertError('CEP não encontrado');
	}
	
	const data = await response.json();

	if (data.erro) {
		throw new PesquisaCepError('CEP não encontrado');
	}

	const logradouro = typeof data.logradouro === "string" ? data.logradouro : "";
	const bairro = typeof data.bairro === "string" ? data.bairro : "";
	const localidade = typeof data.localidade === "string" ? data.localidade : "";
	const uf = typeof data.uf === "string" ? data.uf : "";

	return new Endereco(logradouro, bairro, localidade, uf);
}



// EXERCÍCIO 10.
/**
 * Faça o formulário na tela de pesquisa de CEP. Você o encontra facilmente no HTML.
 *
 * No campo do resultado do CEP, você deve colocar as informações do CEP encontrado
 * (converta a instância de Endereco encontrada em string para fazer isso). Se ocorrer
 * algum erro na busca, coloque a mensagem de erro lá também (use o try-catch para isso).
 */
async function pesquisarCepDOM() {
	const cepInput = document.getElementById('cep');
	const resultadoInput = document.getElementById('resultado-cep');

	try {
		const endereco = await pesquisarCep(cepInput.value);
		const enderecoStr = `${endereco.logradouro} - ${endereco.bairro} - ${endereco.cidade} - ${endereco.uf}`;
			resultadoInput.value = enderecoStr;
	} catch (error) {
		resultadoInput.value = error.message;
	}
}

// EXERCÍCIO 11.
/**
 * Utilizando AJAX ou fetch API, pesquise por um CEP na URL https://pokeapi.co/api/v2/pokemon/NNNNNN,
 * onde NNNNNN é o número ou nome de um pokémon a ser pesquisado.
 * @param {number | string} chave O número ou nome do pokémon a ser pesquisado.
 * @return {Pokemon} Uma instância da classe Pokemon contendo o nome, o número e a URL da foto da arte oficial do pokémon visto de frente.
 * @throws PokemonNaoEncontradoError Se não existir pokémon com o nome ou número dado.
 */
async function pesquisarPokemon(chave) {
    const url = isNaN(chave)
        ? `https://pokeapi.co/api/v2/pokemon/${chave}`
        : `https://pokeapi.co/api/v2/pokemon/${chave}/`;

    try {
        const response = await fetch(url);
        if (!response.ok) {
            throw new PokemonNaoEncontradoError('Pokémon não encontrado.');
        }

        const data = await response.json();

        const name = data.species.name;
        const number = data.id;
        const imageUrl = data.sprites.other['official-artwork'].front_default;

        if (!name || !number || !imageUrl) {
            throw new PokemonNaoEncontradoError('Informações do Pokémon não encontradas.');
        }

        return new Pokemon (name, number, imageUrl);
		
    } catch (error) {
        if (error instanceof PokemonNaoEncontradoError) {
            throw error;
        } else {
            console.error(error);
            throw new Error('Erro ao pesquisar o pokémon.');
        }
    }
}


// EXERCÍCIO 12.
/**
 * Faça o formulário na tela de pesquisa de pokémon. Você o encontra facilmente no HTML.
 *
 * Há três campos para os resultados: O nome do pokémon, o número e uma imagem.
 * Se ocorrer algum erro na busca, coloque a mensagem de erro no campo do nome e coloque
 * o link https://cdn-icons-png.flaticon.com/256/4467/4467515.png na foto (use o try-catch).
 */
async function pesquisarPokemonDOM() {
    const chave = document.getElementById('pokemon-pesquisa').value;
    const nomeInput = document.getElementById('pokemon-nome');
    const numeroInput = document.getElementById('pokemon-numero');
    const fotoImg = document.getElementById('pokemon-foto');

    try {
        const pokemonData = await pesquisarPokemon(chave);
        nomeInput.value = pokemonData.nome;
        numeroInput.value = pokemonData.numero;
        fotoImg.src = pokemonData.foto;
    } catch (error) {
        nomeInput.value = error.message;
        fotoImg.src = 'https://cdn-icons-png.flaticon.com/256/4467/4467515.png';
    }
}
