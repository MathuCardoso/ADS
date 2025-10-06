#include <stdio.h>
#include <locale.h>
#include <stdlib.h>
int main()
{
    system("chcp 65001 > nul");
    setlocale(LC_ALL,"utf8");

    int n = 0, i = 1;

    printf("***Progressão Aritmética de razão r = 3 e termo inicial = 0***\n");
    while (i <= 20)
    {
        printf("%d, ", n);
        n+=3;
        i++;

    }
    

    return 0;
}
