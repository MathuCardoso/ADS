#include <ctype.h>
#include <stdio.h>
 int main()
{
    int i = 1, idade = 0, mMaisVelha = 0, hMaisNovo = 0, nHomens = 0;
    float peso = 0, pMaisPesada = 0, pMenospesada = 0;
    char resp = 'S', genero;

    while (resp == 'S')
    {
        printf("Qual o genero da pessoa?\n");
        scanf(" %c", &genero);
        genero = toupper(genero);
        if(genero == 'H') {
            nHomens++;
        }
    
        printf("Qual sua idade? \n");
        scanf("%d", &idade);

        if (genero == 'M' && idade > mMaisVelha){
            mMaisVelha = idade;
        } else {
            if(nHomens == 1){
                hMaisNovo = idade;
            } else if (idade < hMaisNovo){
                hMaisNovo = idade;
            }
            
        }

        printf("E seu peso?\n");
        scanf("%f", &peso);

        if (peso > pMaisPesada){
            pMaisPesada = peso;
        } if (i == 1) {
            pMenospesada = peso;
        } else if (peso < pMenospesada) {
            pMenospesada = peso;
        }
            
        printf("Deseja cadastrar uma nova pessoa? [S/N]\n");
        scanf(" %c", &resp);
        resp = toupper(resp);

        if (resp != 'S' && resp != 'N')
        {
            printf("Resposta incorreta!\nDeseja cadastrar uma nova pessoa? [S, N] \n");
            scanf(" %c", &resp);
        }
        

        i++;
    }

    printf("\nA mulher mais velha: %d", mMaisVelha);
    printf("\nO homem mais novo: %d", hMaisNovo);
    printf("\nA pessoa com maior peso: %.2f", pMaisPesada);
    printf("\nA pessoa com menor peso: %.2f", pMenospesada);
    
    
    return 0;
}
