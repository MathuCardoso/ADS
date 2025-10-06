#include <stdio.h>
#include <ctype.h>
int main()
{
    
    int i = 1, idade, somaIdade = 0, maiorIdade = 0, menorIdade = 0, nHomens = 0;
    float mediaIdade;
    char genero;

    while (i <= 10)
    {
        printf("\nDigite a idade da %dª pessoa: ", i);
        scanf("%d", &idade);

        if(i == 1) {
            maiorIdade = idade;
            menorIdade = idade;
        } else {
            if(idade < menorIdade) {
                menorIdade = idade;
        }   if(idade > maiorIdade) {
                maiorIdade = idade;
        }
    }

        printf("Digite o genero da %dª pessoa [F, M]: ", i);
        scanf(" %c", &genero);
        genero = toupper(genero);

        if (genero == 'M') {
            nHomens++;
        }

        somaIdade+=idade;
        i++;
    }


    mediaIdade = somaIdade / 10;


    printf("\nA MAIOR idade do grupo e: %d\n", maiorIdade);
    printf("A MENOR idade do grupo e: %d\n", menorIdade);

    printf("A media de idade das mulheres e: %.2f\n", mediaIdade);

    printf("O numero de homens e: %d\n", nHomens);
    

    return 0;
}
