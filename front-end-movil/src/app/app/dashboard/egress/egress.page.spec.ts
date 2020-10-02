import { async, ComponentFixture, TestBed } from '@angular/core/testing';
import { IonicModule } from '@ionic/angular';

import { EgressPage } from './egress.page';

describe('EgressPage', () => {
  let component: EgressPage;
  let fixture: ComponentFixture<EgressPage>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ EgressPage ],
      imports: [IonicModule.forRoot()]
    }).compileComponents();

    fixture = TestBed.createComponent(EgressPage);
    component = fixture.componentInstance;
    fixture.detectChanges();
  }));

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
