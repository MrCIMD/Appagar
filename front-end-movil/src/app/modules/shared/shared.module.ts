import { NgModule } from "@angular/core";
import { CommonModule } from "@angular/common";
import { SocialBannerComponent } from "./social-banner/social-banner.component";
import { IonicModule } from "@ionic/angular";

@NgModule({
  declarations: [SocialBannerComponent],
  imports: [CommonModule, IonicModule],
  exports: [SocialBannerComponent],
})
export class SharedModule {}
