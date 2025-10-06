#include <ctype.h>
#include <stdio.h>
int main()
{
    int i = 1;
    float a, b, media;
    char continuar = 'S';

    while (continuar == 'S')
    {
        printf("Aluno %d\n", i);
        printf("Entre com a nota A: ");
        scanf("%f", &a);
        printf("Entre com a nota B: ");
        scanf("%f", &b);

        media = (a + (b*2)) / 3;

        printf("Media do aluno %d = %.2f\n", i, media);

        printf("Continuar (s/n) ?\n");
        scanf(" %c", &continuar);
        continuar = toupper(continuar);

        if (continuar != 'S' && continuar != 'N')
        {
            printf("ERRO: Resposta invalida!\n");  
            printf("Continuar (s/n) ?\n");
            scanf(" %c", &continuar);
            continuar = toupper(continuar);     
        }
        
        i++;
    }

    


    return 0;
}
