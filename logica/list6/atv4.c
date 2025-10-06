#include <stdio.h>
#include <ctype.h>
int main()
{

    int i = 1, idade = 1, totalEspc = 0, totalVotos = 0, totalRecomend = 0;
    char gostou, recomend;


    

    while (idade > 0)
    {   
        printf("\nOla espectador!\nQual sua idade?\n");
        scanf("%d", &idade);

        if (idade <= 0)
            break;
        
        printf("Voce gostou do filme? [S, N]\n");
        scanf(" %c", &gostou);
        gostou = toupper(gostou);

        if(gostou == 'S' || gostou == 'N')
            totalVotos++;

        printf("Voce recomendaria o filme para algum colega seu? [S, N]\n");
        scanf(" %c", &recomend);
        recomend = toupper(recomend);

        if(recomend == 'S')
            totalRecomend++;

        totalEspc++;
        i++;
    }

    printf("\nTotal de pessoas que assistiram o filme: %d", totalEspc);
    printf("\nTotal de pessoas que gostaram do filme: %d", totalVotos);
    printf("\nTotal de pessoas que recomendariam o filme para um colega: %d", totalRecomend);
    

    return 0;
}
