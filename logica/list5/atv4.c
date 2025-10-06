#include <stdio.h>
#include <locale.h>
#include <stdlib.h>

int main()
{
    system("chcp 65001 > nul");
    setlocale(LC_ALL,"utf8");

    int i = 1, nPar = 0, nImpar = 0, n;
    
    printf("Informe 10 números inteiros: \n");
    
    while (i <= 10)
    {
        scanf("%d", &n);

        if(n % 2 == 0) {
            nPar+=n;
        }
        else if(n % 2 != 0) {
            nImpar+=n;
        }

        i++;
    }

    printf("A soma dos números Pares digitados é: %d\n", nPar);
    printf("A soma dos números Ímpares digitados é: %d", nImpar);
    
    
    return 0;
}
