#include <stdio.h>
#include <locale.h>
#include <stdlib.h>
int main()
{
    system("chcp 65001 > nul");
    setlocale(LC_ALL,"utf8");

    int n = -2, i = 1;

    printf("***Progressão Geométrica de razão r = -2 e termo inicial = -2***\n");
    while (i <= 10)
    {
        printf("%d, ", n);
        n*=-2;
        i++;
    }

    return 0;
}
