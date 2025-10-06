#include <stdio.h>
#include <locale.h>
#include <stdlib.h>
int main()
{
    system("chcp 65001 > nul");
    setlocale(LC_ALL,"utf8");

    int i = 1, n, nMaior = 0, media = 0, soma = 0 ;

    printf("Digite 15 numeros abaixo:\n");
    while (i <= 15)
    {        
        printf("%dº: ", i);
        scanf("%d", &n);

        if (n > 10)
        {

            soma+=n;

            nMaior+=1;
        }

        i++;
    }

    if(nMaior > 0) {
        media = soma / nMaior;
        printf("A média dos números maiores do que 10 digitados é: %d", media);
    }
    else {
        printf("Nenhum número digitado é maior do que 10.");
    }
    
    return 0;
}
