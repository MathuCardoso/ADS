#include <stdio.h>
#include <locale.h>
#include <stdlib.h>
int main()
{
    system("chcp 65001 > nul");
    setlocale(LC_ALL, ".utf8");

    int matriz[3][5] = {
        {1, 2, 3, 4, 5},
        {6, 7, 8, 9, 10},
        {11, 12, 13, 14, 15}
    };
    int i, j;

    for (i = 0; i < 3; i++)
    {
        for (j = 0; j < 5; j++)
        {
            printf("[%d][%d] = %d   ", i, j, matriz[i][j]);
        }
        printf("\n");
    }

    for (i = 0; i < 3; i++)
    {
        for (j = 0; j < 5; j++)
        {
            if (i == j)
            {
                matriz[i][j] = 0;
            }
            printf("%3d  ", matriz[i][j]);
        }
        printf("\n");
    }

    return 0;
}