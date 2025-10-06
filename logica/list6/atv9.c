#include <stdio.h>
#include <ctype.h>
int main()
{
    int i = 1, idade = 0, menorIdade = 0, nHomens = 0, nMulheres = 0;
    char genero, olhos, cabelos;

    while (i <= 50)
    {
        printf("Pessoa %d\n", i);
        printf("Informe seu genero [H/M]:");
        scanf(" %c", &genero);
        genero = toupper(genero);

        printf("Informe a cor dos seus olhos\n[A] - Azul\n[V] - Verde\n[P] - Preto\n[C] - Castanho\n");
        scanf(" %c", &olhos);
        olhos = toupper(olhos);

        printf("Informe a cor do seu cabelo\n[L] - Louro\n[C] - Castanho\n[P] - Preto\n");
        scanf(" %c", &cabelos);
        cabelos = toupper(cabelos);

        printf("Agora informe sua idade: ");
        scanf("%d", &idade);

        if (genero == 'H' && (idade >= 16 && idade <= 24) && olhos == 'A' && cabelos == 'C'){
            nHomens++;
        } else if(genero == 'M' && (idade < 40) && olhos == 'P' && cabelos == 'P') {
            nMulheres++;
        }

        if(i == 1) {
            menorIdade = idade;
        } else if(idade < menorIdade) {
            menorIdade = idade;
        }

        i++;

    }

    printf("\nA menor idade do grupo: %d\n", menorIdade);
    printf("\nA quantidade de indivíduos do sexo masculino, cuja idade está entre 16 e 24 anos e que tenham olhos azuis e cabelos castanhos: %d\n", nHomens);

    printf("\nA quantidade de indivíduos do sexo femenino, cuja idade seja menor que 40 anos e que tenham olhos e cabelos pretos: %d\n", nMulheres);

    



    return 0;
}
